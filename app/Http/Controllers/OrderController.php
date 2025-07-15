<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Order;
use App\Models\Journal;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder()
    {
        $products = Product::all();
        return view('admin.orders.create', compact('products'));
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'required|integer|exists:products,id',
            'quantity' => 'required|array',
        ]);
        $rules = [];
        foreach ($request->product_ids as $pId) {
            $rules["quantity.$pId"] = 'required|numeric|min:1';
        }
        $request->validate($rules);

        DB::beginTransaction();

        try {
            $subtotal = 0;
            $discount = $request->discount ?? 0;
            $paid_amount = $request->paid_amount ?? 0;

            $order = Order::create([
                'order_id' => 'ORD_' . rand(100000, 999999),
                'discount' => 0,
                'vat' => 0,
                'total_amount' => 0,
                'paid_amount' => 0,
                'due_amount' => 0,
            ]);

            foreach ($request->product_ids as $productId) {
                $product = Product::find($productId);
                $quantity = $request->quantity[$productId];
                if ($quantity > $product->current_stock) {
                    DB::rollBack();
                    flash()->error("Stock unavailable for product: $product->name");
                    return redirect()->back();
                }
                $lineTotal = $quantity * $product->sell_price;
                $subtotal += $lineTotal;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'unit_price' => $product->sell_price,
                ]);

                $product->current_stock -= $quantity;
                $product->save();

            }

            $total_amount_after_discount = $subtotal - $discount;
            $vat = $total_amount_after_discount * 0.05;
            $grandTotal = $total_amount_after_discount + $vat;
            $due_amount = $grandTotal - $paid_amount;

            $order->update([
                'discount' => $discount,
                'vat' => $vat,
                'total_amount' => $grandTotal,
                'paid_amount' => $paid_amount,
                'due_amount' => $due_amount,
            ]);

            Journal::insert(values: [
                ['order_id' => $order->id, 'type' => 'sales', 'amount' => $subtotal, 'created_at' => now(), 'updated_at' => now()],
                ['order_id' => $order->id, 'type' => 'discount', 'amount' => $discount, 'created_at' => now(), 'updated_at' => now()],
                ['order_id' => $order->id, 'type' => 'vat', 'amount' => $vat, 'created_at' => now(), 'updated_at' => now()],
                ['order_id' => $order->id, 'type' => 'cash', 'amount' => $paid_amount, 'created_at' => now(), 'updated_at' => now()],
                ['order_id' => $order->id, 'type' => 'due', 'amount' => $due_amount, 'created_at' => now(), 'updated_at' => now()],
            ]);

            DB::commit();
            flash()->success('Order created successfully.');
            return redirect()->route('order.list');

        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error('Something went wrong while creating the order.');
            return redirect()->back();
        }

    }

    public function orderList()
    {
        $orders = Order::with('order_details.product')->get();
        return view('admin.orders.list', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with('order_details.product')->findOrFail($id);
        return view('admin.orders.details', compact('order'));
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->order_details()->each(function ($detail) {
            $product = Product::find($detail->product_id);
            $product->current_stock += $detail->quantity;
            $product->save();
        });

        $order->delete();
        flash()->success('Order deleted successfully.');
        return redirect()->back();
    }

}
