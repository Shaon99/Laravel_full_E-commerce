@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header" >
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi  mdi-plus"></i> </span>Update Brand</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <a href="/admin/brand" class="btn btn-gradient-info ">All Brand</a>
              </ol>
            </nav>
      </div>
          <div class="card">
            <div class="card-body">
<form action="{{url('/admin/updatebrand/'.$brand->id)}}" method="post" enctype="multipart/form-data">
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
<div class="control-group">
    <div class="form-group floating-label-form-group controls">
      <label class="">Brand Name</label>
      <input type="text" class="form-control " style="font-size:20px;   font-weight: bold;" value="{{$brand->name}}" name="name" >
    </div>
</div>
<div class="control-group">
    <div class="form-group floating-label-form-group controls">
      <label class="">New logo</label>
      <input type="file" class="form-control" name="logo"><br>
     <h4 class="text-danger">Old logo:</h4><img src="{{URL::to($brand->logo)}}" height="100px;" width="100px;" >
      <input type="hidden" name="old_photo" value="{{ $brand->logo}}"><br>

    </div>
    </div>

 
  <button type="submit" class="btn btn-success" >Update</button>
</div>
</form>
    </div>
</div>
</div>

</div>
                        
@endsection