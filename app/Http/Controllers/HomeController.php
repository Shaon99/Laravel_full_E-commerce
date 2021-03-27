<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  
    public function index()
    {
        $data=Brand::all();
        $data1=Product::all();
        $data2=Product::where('feature','=','Yes')->get();

        return view('welcome',compact('data','data1','data2'));
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
