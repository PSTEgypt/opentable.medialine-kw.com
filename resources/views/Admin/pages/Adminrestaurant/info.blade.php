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
                       المطعم
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
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
                          
                            <div class="card-body">

                                <h2 class="card-title">بيانات المطعم </h2>

                               <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <a style="margin-bottom:10px"class="btn btn-primary btn-larg" 
                href="/restaurant/edit/">{{trans('dashboard.TableEdit')}} البيانات</a>
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px"  style="margin-bottom:50px"src="{{asset($restaurant->main_image)}}" alt="User profile picture">
                </div>



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$restaurant->name}}</span> <b class="float-right">اسم المطعم     </b>
                  </li>

                     <li class="list-group-item">
                    <span>{{$restaurant->email}}</span> <b class="float-right">{{trans('dashboard.TableEmail')}}     </b>
                  </li>

                    <li class="list-group-item">
                                       <b class="float-right">نوع الخدمة      </b>

                      @foreach($restaurant->category as $category)
                        @if($category->category == 'reservation')
                         <b>
                        حجزات 
                        </b>
                        <br>
                       <span>
                         سعر الخدمة : {{$category->reservation_price}} 

                        </span>
                                  <br>
                                                                        <span>
                      متوسط حجز الطاوله :  {{$category->reservation_count}} 

                        </span>
 <br>
                                                                                               <span>
                        سعر الخدمة  : {{$category->reservation_time}}

                        </span>
                        <br>
                        <hr>
                        @elseif($category->category == 'delivery')

                         <b>
                        توصيل طلبات  
                        </b>
                        <br>
                       <span>
                         تكلفة التوصيل   : {{$category->delivery_price}} 

                        </span>
   

                        @elseif($category->category == 'curb')
                                      <b>عربية طعام </b>           
                        @else
لايوجد
                        @endif
                      @endforeach
                  </li>

                     <li class="list-group-item">
                    <span>@foreach($restaurant->types as $type) {{$type->name}},@endforeach</span> <b class="float-right">التصنيف    </b>
                  </li>


                  <li class="list-group-item">
                  <b class="float-right">وصف المطعم     </b>
                    <span>{{$restaurant->description}}</span> 
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($restaurant->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>



                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

   
                            </div>



                              
                        </div>


                           <div class="card">
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
                          
                            <div class="card-body">

                                <h2 class="card-title">   صور المطعم</h2>

                              @foreach($restaurant->images as $images)

<div class="col-lg-3" style="display:inline-block">
<div class="thumbnail">
  <img src="{{asset($images->image)}}" alt="..." width="150px" height="150px">
  <div class="caption">
    </form>
  </div>
</div>
</div>

@endforeach

   
                            </div>



                              
                        </div>


                          <div class="card">
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
                          
                            <div class="card-body">

                                <h2 class="card-title"> التواصل   </h2>

                              <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">


                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$restaurant->phone}}</span> <b class="float-right">رقم الهاتف     </b>
                  </li>

                                       <li class="list-group-item">
                    <span>{{$restaurant->facebook}}</span> <b class="float-right"> facebook   </b>
                  </li>

                                       <li class="list-group-item">
                    <span>{{$restaurant->youtube}}</span> <b class="float-right">youtube    </b>
                  </li>

                                       <li class="list-group-item">
                    <span>{{$restaurant->instgram}}</span> <b class="float-right"> instgram   </b>
                  </li>
                     </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

   
                            </div>



                              
                        </div>


                          <div class="card">
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
                          
                            <div class="card-body">

                                <h2 class="card-title"> الخدمات المتاحة   
</h2>

                                <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">


                <ul class="list-group list-group-unbordered mb-3">
@foreach($restaurant->services  as $services )
                     <li class="list-group-item">
                   <b class="float-right">  {{$services->name}}    </b>
                  </li>
@endforeach
                  
                     </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

   
                            </div>



                              
                        </div>


                          <div class="card">
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
                          
                            <div class="card-body">

                                <h2 class="card-title">وجبات المطعم  </h2>

                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
        <tr>
            <th> الصور </th>
            <th >{{trans('dashboard.TableName')}}   </th>
            <th>  الوصف </th>
            <th>السعر  </th>
        </tr>
        </thead>
        <tbody>  
@foreach($restaurant->food as $food)
        <tr>

<th><img src="{{asset($food->image)}}" width=50px > </th>
<th>{{$food->name}}</th>
<th>{{$food->description}}</th>
<th>{{$food->price}}</th>

        </tr>

        @endforeach  

        </tbody>
                                    </table>

   
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
    </script>
    <!-- ============================================================== -->
    

 @endsection
 
@endsection
