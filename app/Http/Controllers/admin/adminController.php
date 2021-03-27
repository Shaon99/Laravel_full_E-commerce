<?php

namespace App\Http\Controllers\Admin;

use App\LogActivity;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }
//login
    public function check(Request $req){
        $validated = $req->validate([
        'email' => 'required|max:25|min:4',
        'password' => 'required|string|min:8|max:20',
    
        ]);

        $userInfo=Admin::where('email','=',$req->email)->first();

        if(!$userInfo){
            return back()->with('fail','Invalid Username');
        }
        else{
            if(Hash::check($req->password, $userInfo->password) &&  $userInfo->role=="Admin"){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('/admin/dashboard');
            }
            else{
                return back()->with('fail','Incorrect password');
            } 
        }
}
//view

    public function dashboard()
    {
        $data=Category::count();
        $data1=Brand::count();
        $data2=User::count();
        $data3=Product::count();



        return view('admin.dashboard',compact('data','data1','data2','data3'));
    }

  

    public function category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function brand(){
        $data=Brand::all();
        return view('admin.brand',compact('data'));
    }

    public function product(){
        $data=Product::
          join('categories','products.category','categories.id')
        ->join('brands','products.brand','brands.id')
        ->select('products.*','categories.slug','brands.name')            
        ->get();
        return view('admin.product', compact('data'));
    }
    public function ship(){
        return view('admin.ship');
    }
    public function order(){
        return view('admin.order');
    }

//productfun
//add
public function addcategory(){
    return view('admin.product.addcategory');
}
public function storeCategory(Request $req){
    $validated = $req->validate([
        'title' => 'required|unique:categories|max:40|min:4',
        'slug' => 'required|unique:categories|max:20',
        'status' => 'required',

    ]);
        $category=new Category();
        $category->title = $req->title;
        $category->slug = $req->slug;
        $category->status = $req->status;

        $save = $category->save();


  if($save){
    return back()->with('success','Category has been successfuly added');
 }else{
     return back()->with('fail','Something went wrong, try again later');
 }

}
//editupdate
public function editCategory($id){
    $data=Category::where('id',$id)->first();
    return view('admin.product.editcategory',compact('data'));
   }

public function updateCategory(Request $req,$id){
        $validated = $req->validate([
            'title' => 'required|max:40|min:4',
            'slug' => 'required|max:20',
            'status' => 'required',
    
        ]);
            $category=new Category();
            $category->title = $req->title;
            $category->slug = $req->slug;
            $category->status = $req->status;
    
            $save = $category::find($id);
            $save->update($req->all());
    
    
      if($save){
        return back()->with('success','Category has been successfuly Updated');
     }else{
         return back()->with('fail','Something went wrong, try again later');
     }
    
}
//deletecategory
public function delete($id){
    Category::where('id',$id)->delete();
    $notification=array(
        'messege'=>'Successfully Category Deleted',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);;
}
//addbrand
public function addbrand(){
    return view('admin.product.addbrand');
}

public function storebrand(Request $req){
    $validated = $req->validate([
        'name' => 'required|unique:brands|max:25',
        'logo' => 'image|mimes:jpeg,png,jpg,JPG,PNG,gif,svg|max:5000',
        ]);
   $data=new Brand();
   $data->name=$req->name;
   $image=$req->file('logo');
   if($image){
    $image_name=hexdec(uniqid());
    $ext=strtolower($image->getClientOriginalExtension());
    $image_fullname=$image_name.'.'.$ext;
    $path='brand/';
    $image_url=$path.$image_fullname;
    $success=$image->move($path,$image_fullname);
    $data->logo= $image_url;
    $save = $data->save();
    if($save){
        return back()->with('success','Brand has been successfuly Inserted');
     }else{
         return back()->with('fail','Something went wrong, try again later');
     }
}else{
    $save = $data->save();
    if($save){
        return back()->with('success','Brand has been successfuly Inserted');
     }else{
         return back()->with('fail','Something went wrong, try again later');
     }
}
}

public function editbrand($id){
    $brand=Brand::where('id',$id)->first();
    return view('admin.product.editbrand',compact('brand'));
   }
//updatebrand
public function updateb(Request $req,$id) {
        $validated = $req->validate([
            'name' => 'required|max:125',
            'logo' => 'image|mimes:jpeg,png,jpg,JPG,PNG,gif,svg|max:5000',
        ]);
        $data=array();
        $data['name']=$req->name;
        $image=$req->file('logo');

        if($image){
              $image_name=hexdec(uniqid());
              $ext=strtolower($image->getClientOriginalExtension());
              $image_fullname=$image_name.'.'.$ext;
              $path='brand/';
              $image_url=$path.$image_fullname;
              $success=$image->move($path,$image_fullname);
              $data['logo']= $image_url;
              if($req->old_photo==NULL ){
                $save=Brand::where('id',$id)->update($data);          
              }  
              else{
                unlink($req->old_photo);
                $save=Brand::where('id',$id)->update($data);
              }                 
        }        
        else{            
             $data['logo']= $req->old_photo;
             $save=Brand::where('id',$id)->update($data);            
        }
        if($save){
            return back()->with('success','Brand has been successfuly Updated');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
}
//delete
public function deleteb(Request $req,$id){
           
    $brand=Brand::where('id',$id)->first();
     $image=$brand->logo;
     $delete= Brand::where('id',$id)->delete();
     if($delete){
         unlink($image);
         $notification=array(
             'messege'=>'Successfully Brand Deleted',
             'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);;

     }else{
         $notification=array(
             'messege'=>'Something wrong',
             'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);;
     }


    }

//logout
    public function logout(){

        if(session()->has('LoggedUser')){
          session()->pull('LoggedUser');
            return redirect('/admin');
        }
        
    }


}
