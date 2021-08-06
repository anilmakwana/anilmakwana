<?php

Route::group([],function ()
{

Route::any('/addproduct', [App\Modules\Product\Http\Controllers\ProductController::class, 'store'])->name('add_product');
Route::any('/createproduct', [App\Modules\Product\Http\Controllers\ProductController::class, 'create'])->name('create_product');
Route::any('/product', [App\Modules\Product\Http\Controllers\ProductController::class, 'show'])->name('productList');
Route::any('/product_del', [App\Modules\Product\Http\Controllers\ProductController::class, 'destroy'])->name('product_del');
Route::any('/editproduct/{id}', [App\Modules\Product\Http\Controllers\ProductController::class, 'edit'])->name('edit_product');
Route::any('/upd_product', [App\Modules\Product\Http\Controllers\ProductController::class, 'update'])->name('upd_product');
Route::any('/product_status', [App\Modules\Product\Http\Controllers\ProductController::class, 'status'])->name('product_status');

});