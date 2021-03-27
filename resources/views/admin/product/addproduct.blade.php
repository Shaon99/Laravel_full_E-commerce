@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header" >
        <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi  mdi-plus"></i> </span>Add Product</h3>
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <a href="/admin/product" class="btn btn-gradient-info ">All Product</a>
                    </ol>
            </nav>        
    </div>
    <div class="card">
     <div class="card-body">
<form action="{{route('admin.product')}}" method="post" enctype="multipart/form-data">
                    @if(Session::get('success'))
                        <div class="alert bg-gradient-primary">
                         {{ Session::get('success') }}
                        </div>
                    @endif

                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
@csrf
 <div class="form-group">
            <label>Title</label>
            <input type="text" class="mt-1 mb-1 form-control" name="title" placeholder="Title" value="{{old('title')}}">
            <span class="text-danger">@error('title'){{ $message }} @enderror</span>
            </div>
            <div class="form-group floating-label-form-group controls">
                <label>Catagory</label>
                <select class="form-control" name="category_id">
                    @foreach($category as $row)
                    <option value="{{ $row->id }}">{{$row->slug}}</option>
                    @endforeach              
                </select>   
              </div>             
              <div class="form-group floating-label-form-group controls">
                <label>Feature</label>
                <select class="form-control" name="feature">
                  <option>Yes</option>   
                  <option>No</option>              
           
              </select>             
              </div>
            <div class="form-group">
            <label>Price</label>
            <input type="text" class="mt-1 mb-1 form-control" name="price" placeholder="Price" value="{{old('price')}}">
            <span class="text-danger">@error('price'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
            <label>Discount</label>
            <input type="text" class="mt-1 mb-1 form-control" name="discount" placeholder="Discount" value="{{old('discount')}}">
            <span class="text-danger">@error('discount'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
            <label>Size</label>
            <input type="text" class="mt-1 mb-1 form-control" name="size" placeholder="Size" value="{{old('size')}}">
            <span class="text-danger">@error('size'){{ $message }} @enderror</span>
            </div>
            <div class="form-group floating-label-form-group controls">
                <label>Brand</label>
                <select class="form-control" name="brand_id">
                    @foreach($brand as $row)
                    <option value="{{ $row->id }}">{{$row->name}}</option>
                    @endforeach              
                </select>   
              </div>
            <div class="form-group">
            <label>Stock</label>
            <input type="text" class="mt-1 mb-1 form-control" name="stock" placeholder="Stock" value="{{old('stock')}}">
            <span class="text-danger">@error('stock'){{ $message }} @enderror</span>
            </div>

            <div class="form-group">
            <label>Picture</label>
            <input type="file" class="mt-1 mb-1 form-control" name="picture">
            <span class="text-danger">@error('picture'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
            <label>Status</label>
            <input type="text" class="mt-1 mb-1 form-control" name="status" placeholder="Status" value="{{old('status')}}">
            <span class="text-danger">@error('status'){{ $message }} @enderror</span>
            </div>                        
            <div class="mt-3">
                <button type="submit" class="btn btn-gradient-success">Submit</button>
            </div>
      </form>
  </div>
 </div>
</div>
        
</div>
    
@endsection