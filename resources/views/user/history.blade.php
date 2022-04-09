@extends('layouts.template')
@section('content')
<title>My orders</title>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>orders</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Orders</li>
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
              <h3 class="card-title">All orders <hr> Total Ordered: 
                {{
                number_format($orders->sum('total_price'))
              }} L.L</h3>
    
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
                          Pharmacist Name
                          </th>
                    
                          <th>
                            Medicine Name
                          </th>
                          <th>
                            Pharmacy Name
                          </th>
                          <th>
                            Pharmacy Location
                          </th>
                          <th>
                              Quantity
                          </th>
                          <th>
                              Total price
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
                    @foreach($orders as $key=>$order)
                      <tr>
                          <td>
                              <p>{{$key+1}} </p>
                          </td>
                          <td>
                            <p style="font-weight: 600">{{$order->pharmacist->name}}</p>
                          </td>
                
                           <td>
                             <p >{{$order->medicine->name}}</p>
                       
                            <input type="hidden" name="medicine_id" value="{{$order->medicine->id}}">
                            <input type="hidden" name="medicine_quantity" value="{{$order->medicine->quantity}}">
                            <input type="hidden" name="order_quantity" value="{{$order->quantity}}">
                             
                           </td>  
                           <td>
                             <p>{{$order->pharmacist->pharmacy_name}}</p>
                           </td>
                           <td>
                             <p>{{$order->pharmacist->pharmacy_address}}</p>
                           </td>
                           
                           <td>{{$order->quantity}}</td>

                           <td>{{$order->total_price}}</td>

                          <td>
                            <p  >{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</p>
                          </td>
                          <td class="project-actions ">
                              <a class="btn btn-danger btn-sm" id="delete{{$order->id}}"  href="{{url('user/delete/order/'.$order->id)}}" >
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>  
        $(document).on("click", "#delete{{$order->id}}", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to delete?",
                 text: "Once Clicked, This will permanently delete your order",
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
      @endsection
      <!-- /.content-wrapper -->
