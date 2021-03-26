<?php

namespace App\Http\Controllers\Admin;

use App\LogActivity;
use App\Models\Admin;
use App\Models\Category;

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

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function brand(){
        return view('admin.brand');
    }

    public function product(){
        return view('admin.product');
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
    $category=DB::table('categories')->where ('id',$id)->delete();
    $notification=array(
        'messege'=>'Successfully Category Deleted',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);;
}

//logout
    public function logout(){

        if(session()->has('LoggedUser')){
          session()->pull('LoggedUser');
            return redirect('/admin');
        }
        
    }


}
