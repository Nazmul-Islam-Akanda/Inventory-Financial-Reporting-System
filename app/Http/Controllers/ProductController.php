<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct()
    {
        return view('admin.pages.product.create');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'opening_stock' => 'required|integer',
        ]);

        Product::create([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sell_price' => $request->sell_price,
            'opening_stock' => $request->opening_stock,
            'current_stock' => $request->opening_stock,
        ]);

        flash()->success('Product created successfully.');
        return redirect()->route('product.list');
    }

    public function productList()
    {
        $products = Product::all();
        return view('admin.pages.product.list', compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.pages.product.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sell_price' => $request->sell_price,
        ]);

        flash()->success('Product updated successfully.');
        return redirect()->route('product.list');
    }

    public function deleteProduct($id)
    {
        try {

            Product::find($id)->delete();

            flash()->success('Product deleted successfully.');
            return redirect()->route('product.list');

        } catch (\Exception $e) {
            flash()->error('You cannot delete the product.');
            return redirect()->back();
        }
    }

}
