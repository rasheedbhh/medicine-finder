<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pharmacist | Edit Medicine</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

 <div class="wrapper">
    
@extends('layouts.template')
@section('content')
  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit medicine</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit medicine</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Medicine Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <form action="{{url('pharmacist/update/medicine/'.$medicine->id)}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
              <div class="form-group">
                <label for="inputName">Medicine Name</label>
                <input type="text" id="inputName" class="form-control" name="name" placeholder="Enter name" value="{{$medicine->name}}">
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea id="summernote" class="form-control" name="description" 
                  >
                {{$medicine->description}}
                    </textarea>
                </div>
                </div><!-- col-8 -->
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input type="text" id="inputName" class="form-control" name="price" placeholder="Enter price" value="{{$medicine->price}}">
              </div>
              <div class="form-group">
                <label for="inputName">Quantity</label>
                <input type="text" id="inputName" class="form-control" name="quantity" placeholder="Enter quantity" value="{{$medicine->quantity}}">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="hidden" id="inputName" class="form-control" name="pharmacist_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="old_image" value="{{$medicine->image}}"></div>
              </div>
              <div class="form-group">
              <div class="form-check">   
           
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="active" value="1">     
                <label class="form-check-label" for="exampleCheck1">Active</label>
              </div> 
              <div class="form-check mb-4">   
               
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="main_page" value="1"> 
                <label class="form-check-label" for="exampleCheck1">Main Page</label>
              </div> 
             </div>
              <input type="submit" value="Create new Post" class="btn btn-info">
            </div>
               
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 </div>
@endsection


</body>
</html>
