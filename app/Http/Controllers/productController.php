<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function addproduct(){
        $category=Category::all();
        $brand=Brand::all();
        return view('admin.product.addproduct',compact('category','brand'));
    }
    public function storeProduct(Request $req){
        $validated = $req->validate([
            'title' => 'required',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'size' => 'required',
            'stock' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,JPG,PNG,gif,svg|max:10000',
            'status' => 'required',
            ]);
       $data=new Product();
       $data->title=$req->title;
       $data->category=$req->category_id;
       $data->feature=$req->feature;
       $data->price=$req->price;
       $data->discount=$req->discount;
       $data->size=$req->size;
       $data->brand=$req->brand_id;
       $data->stock=$req->stock;
       $data->status=$req->status;

       $image=$req->file('picture');
       if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_fullname=$image_name.'.'.$ext;
        $path='product/';
        $image_url=$path.$image_fullname;
        $success=$image->move($path,$image_fullname);
        $data->image= $image_url;
        $save = $data->save();
        if($save){
            return back()->with('success','Product has been successfuly Inserted');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }else{
        $save = $data->save();
        if($save){
            return back()->with('success','Product has been successfuly Inserted');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }
    }
}
