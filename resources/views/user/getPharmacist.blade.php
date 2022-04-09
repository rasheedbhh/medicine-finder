@extends('layouts.userTemplate')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pharmacist profile</h1>
          </div>
     
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if ($pharmacist->profile_photo_path != NULL)
                    <div class="image">
                      <img src="{{asset('storage/'.$pharmacist->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
                    </div>
                    @else
                    <div class="image">
                      <img src="{{asset('frontend/adminPanel/images/user-icon-png-pnglogocom-133466.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 60px; width:60px;">
                    </div>
                    @endif
                </div>

                <h3 class="profile-username text-center">{{$pharmacist->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Medicines Available</b> <a class="float-right">{{$pharmacist->medicines->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Orders</b> <a class="float-right">543</a>
                  </li>
             
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About {{$pharmacist->name}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted">
                  {{$pharmacist->email}}
                </p>

                <hr>
                <strong> <i class="fas fa-briefcase-medical mr-1"></i> Pharmacy Name</strong>
                <p class="text-muted">
                 {{$pharmacist->pharmacy_name}}
                </p> 

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{$pharmacist->pharmacy_address}}</p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                <p class="text-muted">
                    {{$pharmacist->phone_number}}
                </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
     <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Posts</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach ($pharmacist->medicines as $key=>$medicine)
                       
                    <div class="post">
                      <div class="user-block">
                        @if ($medicine->pharmacist->profile_photo_path != NULL)
                        <img src="{{asset('storage/'.$medicine->pharmacist->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
                        @else
                        <img src="{{asset('frontend/adminPanel/images/user-icon-png-pnglogocom-133466.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
                        @endif
                        <span class="username">
                          <a href="">{{$medicine->pharmacist->name}}</a>
                          </a>
                        </span> 
                        <span class="description">{{\Carbon\Carbon::parse($medicine->created_at)->diffForHumans() }}</span>
                      </div>
                      <!-- /.user-block -->
                     <p class="text-dark"> <i class="fas fa-tablets"></i> <b>Name:</b>  
                      <a href="{{route('getMedicine/'.$medicine->name)}}" class="text-dark"> <u>{{$medicine->name}}   </u></a> </p>

                      <p class="text-dark">
                        <i class="fas fa-file-medical"></i> <b>Description:</b> 
                      
                      {!!$medicine->description!!}
                     

                        </p>              
                      <p class="text-dark"> <i class="fas fa-money-bill"></i> <b> Price:</b> {{$medicine->price}}L.L</p>
                      <div class="image">
                        <img src="{{asset($medicine->image)}}"  alt="Medicine Image" style="width: 50%;" >
                      </div>
                      <p class="mt-4"> 
                        <a href="#" class=" text-sm pr-4" style="color: #6c757d;"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <a href="#" class=" text-sm mr-2" style="color: #6c757d;"><i class="fas fa-share mr-1"></i> Share</a>
                       
                        <span class="float-right">
                          <a href="#" class=" text-sm" style="color: #6c757d;">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                 
                    @endforeach
                 
                    <!-- /.post -->

           
               
                  </div>
      
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> 
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection