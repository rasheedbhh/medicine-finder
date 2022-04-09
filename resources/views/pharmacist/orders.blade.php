@extends('layouts.template')
@section('content')
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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                          User Name
                          </th>
                    
                          <th>
                            Medicine Name
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
                            <p style="font-weight: 600">{{$order->user->name}}</p>
                          </td>
                
                           <td>
                             <p >{{$order->medicine->name}}</p>
                           </td>
 
                           <td>{{$order->quantity}}</td>

                           <td>{{$order->total_price}}</td>

                          <td>
                            <p  >{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</p>
                          </td>
                          <td class="project-actions ">
                           
                              <a class="btn btn-info btn-sm" href="{{url('admin/edit/order/'.$order->id)}}">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                            </a>
                              <a class="btn btn-danger btn-sm" id="delete" href="{{url('admin/delete/order/'.$order->id)}}">
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
