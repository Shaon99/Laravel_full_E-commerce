@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header" >
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi  mdi-plus"></i> </span>Add Category</h3>
        
      </div>
          <div class="card">
            <div class="card-body">
                <form action="{{route('admin.category')}}" method="post">
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

            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="mt-1 mb-1 form-control" name="slug" placeholder="Slug Name" value="{{old('slug')}}">
                <span class="text-danger">@error('slug'){{ $message }} @enderror</span>
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