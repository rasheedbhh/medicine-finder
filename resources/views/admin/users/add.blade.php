@extends('layouts.template')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="{{route('addUser')}}" method="POST">
                @csrf 
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">User Name</label>
                <input type="text" id="inputName" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="inputDescription">Email</label>
                <input type="email" id="inputClientCompany" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Phone Number</label>
                <input type="phone" id="inputClientCompany" class="form-control" name="phone_number">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Password</label>
                <input type="password" id="inputProjectLeader" class="form-control" name="password">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Add new user" class="btn btn-success">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->>
@endsection