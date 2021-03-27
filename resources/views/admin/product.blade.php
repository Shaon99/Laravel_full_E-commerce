@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header" >
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi  mdi-buffer"></i> </span>Product</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <a href="/admin/addproduct" class="btn btn-gradient-info mdi mdi-plus">Add Product</a>
          </ol>
        </nav>
      </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Is Feature</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Size</th>
                    <th>Brand</th>
                    <th>Stock</th>
                    <th>Picture</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach($data as $row)
                </thead>
                <tbody>
                  <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->slug}}</td>
                    <td>{{$row->feature}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->discount}}</td>
                    <td>{{$row->size}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->stock}}</td>
                    <td><img src="{{URL::to($row->image)}}" class="rounded"></td>
                    <td><label class="badge badge-danger">{{$row->status}}</label></td>
                    <td><a href=""><i class="mdi mdi-pencil-box-outline tip" style="font-size: 20px;color:rgb(13, 27, 221);">
                        <span class="tooltiptext h6">Edit</span>
                    </i></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><i class="mdi mdi-delete tip" style="font-size: 20px;color:crimson;">
                        <span class="tooltiptext h6">Delete</span>
                    </i></a></td>

                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
        
        </div>
    
@endsection