
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
               <h1>Medicines</h1>
             </div>
             <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                 <li class="breadcrumb-item active">Pharmacsits</li>
               </ol>
             </div>
           </div>
         </div><!-- /.container-fluid -->
       </section>
   
       <!-- Main content -->
       <section class="content">
   
         <!-- Default box -->
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">All Medicines</h3>
   
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                 <i class="fas fa-times"></i>
               </button>
             </div>
           </div>
           <div class="card-body p-0">
             <table id="datatable1" class="table table-striped projects">
                 <thead>
   
                          <tr>
                         <th >
                             #
                         </th>
                         <th >
                             Name
                         </th>
                   
                         <th >
                             Image
                         </th>
                         <th>
                             Description
                         </th>
                          <th>
                            Quantity
                        </th> 
                        <th>
                            Price
                          </th>
                       <th  >
                         Created At
                     </th>
                         <th >
                           Actions
                         </th>
                     </tr>
                
                  
                 </thead>
                 <tbody>
                   @foreach($medicines as $key=>$medicine)
                     <tr>
                         <td class="col-1">
                             <p>{{$key+1}} </p>
                         </td>
                         <td class="col-1">
                           <p style="font-weight: 600">{{$medicine->name}}</p>
                         </td>
                       <td class="col-1">
                       
                             <img src="{{asset($medicine->image)}}" alt="" style="width: 50px; height:50px;">
                           
                         </td> 
                       
                         <td class="col-5">
                            <p >{!!$medicine->description!!}</p>
                          </td>
                  
                          <td>
                            <p >{{$medicine->quantity}}</p>
                          </td>

                          <td>
                            <p >{{$medicine->price}}</p>
                          </td>


                         <td>
                           <p  >{{ \Carbon\Carbon::parse($medicine->created_at)->diffForHumans() }}</p>
                         </td>
                         <td class="project-actions ">
                          
                             <a class="btn btn-info btn-sm" href="{{url('pharmacist/edit/medicine/'.$medicine->id)}}">
                                 <i class="fas fa-pencil-alt">
                                 </i>
                           </a>
                             <a class="btn btn-danger btn-sm" id="delete" href="{{url('pharmacist/delete/medicine/'.$medicine->id)}}">
                                 <i class="fas fa-trash">
                                 </i>
                           
                             </a>
                         </td>
   
                     </tr>
                     
                      @endforeach                      
                      <hr style="color: black; background-color:black;">
                 </tbody>
             </table>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
   
       </section>
       <!-- /.content -->
     </div>
     @endsection
     <!-- /.content-wrapper -->
    </div>
    