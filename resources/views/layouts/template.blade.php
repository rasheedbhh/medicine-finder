<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <link rel="stylesheet" href="{{asset('backend/css/starlight.css')}}">
  <link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
  <link href="{{asset('backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">


<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">

    <img class="animation__shake" src="{{asset('frontend/adminPanel/dist/img/rlogo.png')}}" alt="AdminLTELogo" height="100" width="100">
  </div> 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('profile.show')}}" class="nav-link">Manage Profile</a>
      </li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" class="nav-link"
                 onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
      </a>
    </form>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          @if (Auth::user()->profile_photo_path!=NULL)
        <div class="image">
          <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image" style="height: 40px; width:40px;">
        </div>
        @else
        <div class="image">
          <img src="{{asset('frontend/adminPanel/images/user-icon-png-pnglogocom-133466.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 30px; width:30px;">
        </div>
        @endif
 
        <div class="info">
          <a href="{{route('profile.show')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                
          

          @can('manage-users')
                        <li class="nav-header">Admin</li>
          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          
         
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allUsers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addUser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
  
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Pharmacists
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allPharmacists')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Pharmacists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addPharmacist')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Pharmacist</p>
                </a>
              </li>
            </ul>
          </li>
   
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-pills"></i>
              <p>
                  Medicine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allMedicines')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Medicine</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allOrders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All orders</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan     

          @can('manage-medicine')
                   <li class="nav-header">Pharmacist</li>
          <li class="nav-item menu-open">
                    <a href="" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Medicine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pharmacist/all/medicine/'.Auth::user()->id)}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addMedicine')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add medicine</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('myOrders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All orders</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


@yield('content')

<!-- jQuery -->
<script src="{{asset('frontend/adminPanel/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
{{-- <script src="{{asset('frontend/adminPanel/plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('frontend/adminPanel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('frontend/adminPanel/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('frontend/adminPanel/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('frontend/adminPanel/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('frontend/adminPanel/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('frontend/adminPanel/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('frontend/adminPanel/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('frontend/adminPanel/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('frontend/adminPanel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('frontend/adminPanel/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('frontend/adminPanel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('frontend/adminPanel/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('frontend/adminPanel/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('frontend/adminPanel/dist/js/pages/dashboard.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('messege'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
             toastr.info("{{ Session::get('messege') }}");
             break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
           toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
  @endif
</script> 
<script>
    $(function () {
      //Add text editor
      $('#summernote').summernote()
    })
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
  <script src="{{asset('backend/lib/popper.js/popper.js')}}"></script>
  <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
  <script src="{{asset('backend/lib/jquery-ui/jquery-ui.js')}}"></script>
  <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
 
  <script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}}"></script>
  <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
  <script src="{{asset('backend/lib/select2/js/select2.min.js')}}"></script> 
   <script>
    $(function(){
        'use strict';
    
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
      });
  </script>
  <script src="{{asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('backend/lib/d3/d3.js')}}"></script>
  <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
  <script src="{{asset('backend/lib/chart.js/Chart.js')}}"></script>
  <script src="{{asset('backend/lib/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('backend/lib/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('backend/lib/Flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>

  <script src="{{asset('backend/js/starlight.js')}}"></script>
  <script src="{{asset('backend/js/ResizeSensor.js')}}"></script>
  <script src="{{asset('backend/js/dashboard.js')}}"></script>
  
  <script src="{{asset('backend/lib/medium-editor/medium-editor.js')}}"></script>
  <script src="{{asset('backend/lib/summernote/summernote-bs4.min.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>  
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you want to delete?",
             text: "Once Clicked, This will Permanently DELETE the Record!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Operation Cancelled!");
             }
           });
       });
</script>
</body>
</html>
