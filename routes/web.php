<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\HomeController;


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
