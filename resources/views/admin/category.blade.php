@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header" >
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-lan"></i> </span>Categories</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <a href="/admin/addcategory" class="btn btn-gradient-info mdi mdi-plus">Add Category</a>
          </ol>
        </nav>
      </div>      
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach($data as $row)
                </thead>
                <tbody>
                  <tr>
                    <td>{{$row->title}}</td>
                    <td>{{$row->slug}}</td>
                    <td><label class="badge badge-success">{{$row->status}}</label></td>
                    <td><a href="{{ URL::to('/admin/editcategory/' .$row->id)}}"><i class="mdi mdi-pencil-box-outline tip" style="font-size: 25px;color:rgb(13, 27, 221);">
                        <span class="tooltiptext h6">Edit</span>
                    </i></a>&nbsp;&nbsp;&nbsp;
                    <a id="delete"href="{{ URL::to('/admin/deletecategory/' .$row->id)}}"><i class="mdi mdi-delete tip"style="font-size: 25px;color:crimson;">
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