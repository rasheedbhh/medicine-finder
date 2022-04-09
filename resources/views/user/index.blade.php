@extends('layouts.userTemplate')
@section('content')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-3">
            <h1>My profile</h1>
          </div>
          <div class="col-9">
            <form class="search-container" action="{{route('user.home')}}" method="GET">
              <input type="text" id="search-bar" placeholder="Search for a medicine " name="search"
              style="width: 500px; border: 3px solid #007BFF; border-radius:10px;">
          
            </form>
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
                    @if (Auth::user()->profile_photo_path!=NULL)
                    <div class="image">
                      <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
                    </div>
                    @else
                    <div class="image">
                      <img src="{{asset('frontend/adminPanel/images/user-icon-png-pnglogocom-133466.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 60px; width:60px;">
                    </div>
                    @endif
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Orders</b> <a class="float-right">{{$countOrders}}</a>
                  </li>
                 
                </ul>
                <a href="{{url('user/myOrders/'.Auth::user()->id)}}" class="btn btn-success btn-block"><b>View order history</b></a>
                <a href="{{route('profile.show')}}" class="btn btn-primary btn-block"><b>Edit profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted">
                  {{Auth::user()->email}}
                </p>
                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                <p class="text-muted">
                  {{Auth::user()->phone_number}}
                </p>

                <hr>
                <strong><i class="fas fa-calendar mr-1"></i> Account created at</strong>

                <p class="text-muted">
                  {{Auth::user()->created_at->isoFormat('MMMM Do YYYY')}}
                </p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="{{url('user/home')}}" >Activity</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach ($medicines as $key=>$medicine)
                       @if ($medicine->quantity > 0)
                              <div class="post">
                      <div class="user-block">
                        @if ($medicine->pharmacist->profile_photo_path != NULL)
                        <img src="{{asset('storage/'.$medicine->pharmacist->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
                        @else
                        <img src="{{asset('frontend/adminPanel/images/user-icon-png-pnglogocom-133466.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
                        @endif
                        <span class="username">
                          <a href="{{url('user/getPharmacist/'.$medicine->pharmacist->id)}}" class="text-dark">
                            {{$medicine->pharmacist->name}}</a>
                         
                          </a>
                        </span> 
                        <span class="description">{{\Carbon\Carbon::parse($medicine->created_at)->diffForHumans() }}</span>
                        
                        
                      </div>
                      <!-- /.user-block -->
                      <p class="text-dark"> <i class="fas fa-tablets"></i> <b>Name:</b>  
                       
                          {{$medicine->name}}   
                         </p>
                          
                        <p class="text-dark">
                          <i class="fas fa-file-medical"></i> <b>Description:</b> 
                        
                        {!!$medicine->description!!}
                       
  
                          </p>    
                    <p class="text-dark">
                      <i class="fas fa-briefcase-medical"></i> <b>Pharmacy Name: </b>  
                      {{$medicine->pharmacist->pharmacy_name}}
                       <br>
                       <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                       {{$medicine->pharmacist->pharmacy_address}}
                      </p>                     
                        <p class="text-dark"> <i class="fas fa-money-bill"></i> <b> Price:</b> {{$medicine->price}}L.L</p>
                      <div class="image">
                        <img src="{{asset($medicine->image)}}"  alt="Medicine Image" style="width: 50%;" >
                      </div>
                      <p class="mt-4"> 
                        <form action="{{url('user/order')}}" method="POST"> 
                          @csrf
                        <input type="hidden" name="pharmacist_id" value="{{$medicine->pharmacist->id}}">
                        <input type="hidden" name="medicine_price" value="{{$medicine->price}}">
                        <input type="hidden" name="medicine_quantity" value="{{$medicine->quantity}}">
                        <input type="hidden" name="medicine_id" value="{{$medicine->id}}">
                        <span style="color: #6c757d;"> Quantity</span> 
                        <input type="number" name="quantity"> 
                        <input type="submit" value="Place Order" class="btn-info btn" id="order" onclick="clicked()">
                      </form>
                       
                       
        
                    </div>
                       @else
                           
                       @endif
                 
                 
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function clicked(){
    Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Yes',
  denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  }
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
  }
</script>
@endsection

