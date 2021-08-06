<?php

Route::group([],function ()
{

Route::any('/addcatagory', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'store'])->name('add_category');
Route::any('/createcatagory', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'create'])->name('create_catagory');
Route::any('/editcatagory/{id}', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'edit'])->name('edit_category');
Route::any('/catagory', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'show'])->name('categoryList');
Route::any('/del_catagory', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'destroy'])->name('del_catagory');
Route::any('/edit_catagory', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'edit'])->name('edit_catagory');
Route::any('/upd_catagory', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'update'])->name('upd_catagory');
Route::any('/catagory_status', [App\Modules\Catagory\Http\Controllers\CatagoryController::class, 'status'])->name('catagory_status');
});