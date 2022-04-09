@extends('layouts.userTemplate')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Medicine</h1>
          </div>
     
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
   
     <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
           
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach ($medicines as $key=>$medicine)
                       
                    <div class="post">
              
                      <!-- /.user-block -->
                     <p class="text-dark"> <i class="fas fa-tablets"></i> <b>Name:</b>  
                      <a href="#" class="text-dark"> <u>{{$medicine->name}}   </u></a> </p>

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