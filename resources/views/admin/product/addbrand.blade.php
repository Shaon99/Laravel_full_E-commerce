@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header" >
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi  mdi-plus"></i> </span>Add Brand</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <a href="/admin/brand" class="btn btn-gradient-info">All Brand</a>
              </ol>
            </nav>
      </div>
          <div class="card">
            <div class="card-body">
                <form action="{{route('admin.brand')}}" method="post" enctype="multipart/form-data">
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
            <div class="form-group">
                <label>Brand</label>
                <input type="text" class="mt-1 mb-1 form-control" name="name"  placeholder="Brand Name" value="{{old('brand')}}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="mt-1 mb-1 form-control" name="logo">
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