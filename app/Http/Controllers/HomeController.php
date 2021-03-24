<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  
    public function index()
    {
        return view('welcome');
    }

    public function  product()
    {
        return view('user.product.index');
    }

   
    
    public function  Contact()
    {
        return view('contactdetails');
    }
}
