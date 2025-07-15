<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route(route: 'admin.dashboard');
    }
    return view('login');
})->name('login');

Route::post('/login',[LoginController::class,'login'])->name('login.post');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('admin.dashboard');
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

    Route::get('/product/create',[ProductController::class, 'createProduct'])->name('product.create');
    Route::post('/product/store',[ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/product/list',[ProductController::class, 'productList'])->name('product.list');
    Route::get('/product/edit/{id}',[ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class, 'updateProduct'])->name('product.update');
    Route::delete('/product/delete/{id}',[ProductController::class, 'deleteProduct'])->name('product.delete');

    Route::get('/order/create', [OrderController::class, 'createOrder'])->name('order.create');
    Route::post('/order/store', [OrderController::class, 'storeOrder'])->name('order.store');
    Route::get('/order/list', [OrderController::class, 'orderList'])->name('order.list');
    Route::get('/order/details/{id}', [OrderController::class, 'orderDetails'])->name('order.details');
    Route::delete('/order/delete/{id}', [OrderController::class, 'deleteOrder'])->name('order.delete');

    Route::get('/journal/ledger', [JournalController::class, 'ledger'])->name('journal.ledger');

    Route::get('/report/generate', [ReportController::class, 'generateReport'])->name('report.generate');
});
