 
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
                        <h3 class="text-themecolor">{{config('dashboard.title')}}</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">
                            {{trans('dashboard.Home')}}
                        </a></li>
                            <li class="breadcrumb-item">
                                {{trans('dashboard.Apps')}}
                            
                        </li>
                            <li class="breadcrumb-item active">{{config('dashboard.title')}}</li>
                        </ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Stats box -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card bg-info">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center">


                     {{trans('dashboard.count')}}
                    </div>
                                    <div class="align-self-center">
                                        <h6 class="text-white m-t-10 m-b-0">
                                            {{trans('dashboard.types')}}
                                       
                                    </h6>
                                        <h2 class="m-t-0 text-white">
                                            {{App\type::count()}}
                                        </h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center">

                     {{trans('dashboard.count')}}
                                        

                                    </div>
                                    <div class="align-self-center">
                                        <h6 class="text-white m-t-10 m-b-0">
                                            {{trans('dashboard.restaurants')}}
                                            
                                        </h6>
                                        <h2 class="m-t-0 text-white">
                                            {{App\restaurant::count()}}
                                        </h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center">

                     {{trans('dashboard.count')}}
                


            </div>
                                    <div class="align-self-center">
                                        <h6 class="text-white m-t-10 m-b-0">

                     {{trans('dashboard.payments')}}
                                         

                                    </h6>
                                        <h2 class="m-t-0 text-white">
                                            {{ App\restaurant_payment::with(['restaurant'=>function($q){
        $q->withTrashed()->get();
    }])->where('is_pay',1)->count() }}
                                            
                                        </h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center">

                     {{trans('dashboard.count')}}
                                         

                                    </div>
                                    <div class="align-self-center">
                                        <h6 class="text-white m-t-10 m-b-0">

                     {{trans('dashboard.unSubscription')}}

                                        

                                    </h6>
                                        <h2 class="m-t-0 text-white">
                        {{ App\restaurant::doesntHave('payment')->count()}}
                                        </h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h3 class="card-title m-b-5"><span class="lstick"></span>
                                            {{trans('dashboard.SalesOverview')}}
                                         
                                    </h3>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="bg-theme stats-bar">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="p-20 active">
                                            <h6 class="text-white">
 {{trans('dashboard.TotalSales')}}
                                            </h6>
                                            <h3 class="text-white m-b-0">0 {{trans('dashboard.pound')}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="p-20">
                                            <h6 class="text-white">
 {{trans('dashboard.ThisMonth')}}
                                        

                                        </h6>
                                            <h3 class="text-white m-b-0">0 {{trans('dashboard.pound')}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="p-20">
                                            <h6 class="text-white">
                                            
 {{trans('dashboard.ThisWeek')}}

                                        </h6>
                                            <h3 class="text-white m-b-0">0 {{trans('dashboard.pound')}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales-overview2" class="p-relative" style="height:330px;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ============================================================== -->
                    <!-- visit charts-->
                    <!-- ============================================================== -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><span class="lstick"></span>

                               
 {{trans('dashboard.VisitSeparation')}}


                            </h4>
                                <div id="visitor" style="height:280px; width:100%;"></div>
                                <table class="table vm font-14 m-b-0">
                                    <tr>
                                        <td class="b-0">
 {{trans('dashboard.Mobile')}}

                                        
                                    </td>
                                        <td class="text-right font-medium b-0">{{rand(1,100)}}%</td>
                                    </tr>
                                    <tr>
                                        <td>
 {{trans('dashboard.Tablet')}}

                                        
                                    </td>
                                        <td class="text-right font-medium">{{rand(1,100)}}%</td>
                                    </tr>
                                    <tr>
                                        <td>
 {{trans('dashboard.Desktop')}}

                                        
                                    </td>
                                        <td class="text-right font-medium">{{rand(1,100)}}%</td>
                                    </tr>
                                    <tr>
                                        <td>
 {{trans('dashboard.Other')}}

                                        
                                    </td>
                                        <td class="text-right font-medium">{{rand(1,100)}}%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Comment and chat -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Right panel -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
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
@endsection