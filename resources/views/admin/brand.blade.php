@extends('admin.index')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header" >
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi  mdi-cube"></i> </span>Brand</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <a href="" class="btn btn-gradient-info mdi mdi-plus">Add Brand</a>
          </ol>
        </nav>
      </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Logo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Jacob</td>
                    <td>ddd</td>
                    <td >
                        <img src="../../assets/images/faces/face2.jpg" alt="image" />
                      </td>
                    <td><a href=""><i class="mdi mdi-pencil-box-outline tip" style="font-size: 25px;color:rgb(13, 27, 221);">
                        <span class="tooltiptext h6">Edit</span>
                    </i></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><i class="mdi mdi-delete tip" style="font-size: 25px;color:crimson;">
                        <span class="tooltiptext h6">Delete</span>
                    </i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        </div>
    
@endsection