<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Feed</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('frontend/adminPanel/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @livewireStyles
</head>
<body class="hold-transition ">
<div class="wrapper">
    @can('manage-nothing')
        
   
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav col-md-3">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a href="{{route('user.home')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto col-md-4">
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
      <li class="nav-item"> 
        
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault();
                          this.closest('form').submit();">
              {{ __('Log Out') }}
        </a>
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
 @endcan
@yield('content')

</div>

  <!-- jQuery -->
<script src="{{asset('frontend/adminPanel/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('frontend/adminPanel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('frontend/adminPanel/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('frontend/adminPanel/dist/js/demo.js')}}"></script>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


 
@livewireScripts
</body>
</html>