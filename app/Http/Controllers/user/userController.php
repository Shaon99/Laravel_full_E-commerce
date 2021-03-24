<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function checkout()
    {       
        return View('user.checkout');            
    }
    

    public function  wishList()
    {
        return view('user.wishlist');
    }

    public function myAccount()
    {
        return view('user.myaccount');
    }

    public function  productDetails()
    {
        return view('user.product.productdetailes');
    }

    

}
