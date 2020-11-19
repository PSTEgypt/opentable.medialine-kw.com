   @extends('Admin.index')
@section('content')


   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">
                          
الطلبات

 </h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">pages</li>
                            <li class="breadcrumb-item active">Table basic</li>
                        </ol>
                    </div>
                    <div>
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">


                                <h2 class="card-title">   ادارة الطلبات الجديدة  </h2>
                                
                                <div class="table-responsive m-t-40">

                         
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                              <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </thead>
                                        <tfoot>
                                             <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </tfoot>
                                        <tbody>

@foreach($orders as $order)
@if($order->status == 'new')
<th>{{$order->id}}</th>
<th><a href="/restaurant/reservation/user/info/{{$order->user->id}}">{{$order->user->name}}</a></th>
<th>{{$order->price}}</th>
<th>{{$order->address}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>
<th><a href="/restaurant/order/info/{{$order->id}}" class="btn btn-block btn-primary btn-flat">عرض</a></th>
@endif
        </tr>
@endforeach


                                        </tbody>
                                    </table>
 

                                </div>
                            </div>
                        </div>

                        
                         <div class="card">
                            <div class="card-body">


                                <h2 class="card-title"> الطلبات قيد التوصيل   </h2>
                                
                                <div class="table-responsive m-t-40">

                         
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                              <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </thead>
                                        <tfoot>
                                             <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </tfoot>
                                        <tbody>

@foreach($orders as $order)
@if($order->status == 'inprogress')
<th>{{$order->id}}</th>
<th><a href="/restaurant/reservation/user/info/{{$order->user->id}}">{{$order->user->name}}</a></th>
<th>{{$order->price}}</th>
<th>{{$order->address}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>
<th><a href="/restaurant/order/info/{{$order->id}}" class="btn btn-block btn-primary btn-flat">عرض</a></th>
@endif
        </tr>
@endforeach


                                        </tbody>
                                    </table>
 

                                </div>
                            </div>
                        </div>






                         <div class="card">
                            <div class="card-body">


                                <h2 class="card-title"> الطلبات المرفوضة </h2>
                                
                                <div class="table-responsive m-t-40">

                         
                                    <table id="example25" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                              <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </thead>
                                        <tfoot>
                                             <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </tfoot>
                                        <tbody>

@foreach($orders as $order)
@if($order->status == 'cancel')
<th>{{$order->id}}</th>
<th><a href="/restaurant/reservation/user/info/{{$order->user->id}}">{{$order->user->name}}</a></th>
<th>{{$order->price}}</th>
<th>{{$order->address}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>
<th><a href="/restaurant/order/info/{{$order->id}}" class="btn btn-block btn-primary btn-flat">عرض</a></th>
@endif
        </tr>
@endforeach


                                        </tbody>
                                    </table>
 

                                </div>
                            </div>
                        </div>




                         <div class="card">
                            <div class="card-body">


                                <h2 class="card-title"> الطلبات تم التوصيل </h2>
                                
                                <div class="table-responsive m-t-40">

                         
                                    <table id="example26" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                              <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </thead>
                                        <tfoot>
                                             <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>السعر الكلي </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th>   </th>
        </tr>
                                        </tfoot>
                                        <tbody>

@foreach($orders as $order)
@if($order->status == 'delivered')
<th>{{$order->id}}</th>
<th><a href="/restaurant/reservation/user/info/{{$order->user->id}}">{{$order->user->name}}</a></th>
<th>{{$order->price}}</th>
<th>{{$order->address}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>
<th><a href="/restaurant/order/info/{{$order->id}}" class="btn btn-block btn-primary btn-flat">عرض</a></th>
@endif
        </tr>
@endforeach


                                        </tbody>
                                    </table>
 

                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme working">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Pro by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>



 @section('javascript')
 
   
 
  
    <!--stickey kit -->
    <script src="{{url('/')}}/admin-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>

 
    <!-- This is data table -->
    <script src="{{url('/')}}/admin-pro/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>

    $('#example23').DataTable({
        

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",

            "lengthMenu":     " ",
        },

    });



     $('#example24').DataTable({
        

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",

            "lengthMenu":     " ",
        },

    });



     $('#example25').DataTable({
        

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",

            "lengthMenu":     " ",
        },

    });




     $('#example26').DataTable({
        

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",

            "lengthMenu":     " ",
        },

    });
    </script>
    <!-- ============================================================== -->
    

 @endsection

@endsection
