<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//view
Route::get('/',[HomeController::Class,'index']);
Route::get('/product',[HomeController::Class,'product'])->name('product.list');
Route::get('/contact',[HomeController::Class,'Contact'])->name('user.contact');

//Adminpanel
Route::get('/admin',[adminController::Class,'index']);
Route::post('/check',[adminController::class,'check'])->name('auth.check');




Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['admin'],'namespace'=>'admin'],function() {
    //adminaccess
    Route::get('/dashboard', [adminController::Class,'dashboard']);
    Route::get('/category', [adminController::Class,'category']);
    Route::get('/brand', [adminController::Class,'brand']);
    Route::get('/product', [adminController::Class,'product']);
    Route::get('/shipping', [adminController::Class,'ship']);
    Route::get('/order', [adminController::Class,'order']);


//productrelatedroute
//category
Route::get('/addcategory', [adminController::Class,'addcategory'])->name('admin.category');
Route::post('/storecategory', [adminController::Class,'storeCategory'])->name('admin.category');
Route::get('/editcategory/{id}', [adminController::Class,'editCategory']);
Route::post('/updatecategory/{id}', [adminController::Class,'updateCategory']);
Route::get('/deletecategory/{id}', [adminController::Class,'delete']);

//brand
Route::get('/addbrand', [adminController::Class,'addbrand'])->name('admin.brand');
Route::post('/storebrand', [adminController::Class,'storebrand'])->name('admin.brand');
Route::get('/editbrand/{id}', [adminController::Class,'editbrand']);
Route::get('/deletebrand/{id}', [adminController::Class,'deleteb']);
Route::post('/updatebrand/{id}', [adminController::Class,'updateb']);

//product
Route::get('/addproduct', [productController::Class,'addproduct'])->name('admin.product');
Route::post('/storeproduct', [productController::Class,'storeProduct'])->name('admin.product');







//logout
    Route::get('/logout', [adminController::Class,'logout']);


});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){
    
    //useraccess
    Route::get('/cart',[userController::Class,'index'])->name('user.cart');
    Route::get('/myaccount',[userController::Class,'myAccount'])->name('user.myaccount');
    Route::get('/checkout',[userController::Class,'checkout'])->name('user.checkout');
    Route::get('/wishlist',[userController::Class,'wishList'])->name('user.wishlist');
    Route::get('/productdetails',[userController::Class,'productDetails'])->name('user.productDetails');

    
});
