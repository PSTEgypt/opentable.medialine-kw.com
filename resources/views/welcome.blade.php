
@extends('layoutDashboard.app',['title'=>'الاحصائيات' ,'subTitle'=>'ادارة الاحصائيات'])
@section('content')
<div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المستخدمين</span>
                <span class="info-box-number">{{$users->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa  fa-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المنتجات </span>
                <span class="info-box-number"> {{$products->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-bullhorn"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الاعلانات</span>
                <span class="info-box-number">{{$ads->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i aria-hidden="true" class="fa fa-shopping-cart "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الطلبات</span>
                <span class="info-box-number">{{$orders->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

@component('components.panel',['subTitle'=>'اخر الطلبات '])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ارقم الطلب   </th>
            <th> اسم العميل </th>
            <th>التاريخ</th>
        </tr>
        </thead>
        <tbody>
@foreach($lastOrder as $order)
        <tr>
<th> <a href="/admin/order/info/{{$order->id}}">{{$order->order_id}}</th>
<th> <a href="/admin/user/info/{{$order->user_id}}">{{$order->user->first_name}}</th>

<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>




        </tr>

        @endforeach
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>{{trans('dashboard.TableName')}} </th>-->
        <!--    <th>{{trans('dashboard.TableEmail')}}</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>رصيد حساب</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endcomponent



@component('components.panel',['subTitle'=>'اخر المستخدميين '])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableName')}} </th>
            <th>التاريخ</th>
            <th>الحالة</th>
        </tr>
        </thead>
        <tbody>
@foreach($lastUser as $user)
        <tr>
<th> <a href="/admin/user/info/{{$user->id}}">{{$user->first_name  }} {{$user->last_name  }}</th>
<th>{{Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</th>
@if($user->is_active == 1)
<th><a  href="/admin/user/status/{{$user->id}}" class="btn btn-block btn-success btn-sm">{{trans('dashboard.Active')}}</a></th>
@else
<th><a  href="/admin/user/status/{{$user->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.Deactive')}}</a></th>
@endif


        </tr>

        @endforeach
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>{{trans('dashboard.TableName')}} </th>-->
        <!--    <th>{{trans('dashboard.TableEmail')}}</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>رصيد حساب</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>
@endcomponent
<div class="row">

<div class="col-lg-12" style="
    margin-bottom: 40px;
">
{!! $ordersChart->html() !!}
</div>

<div class="col-lg-12">
{!! $userChart->html() !!}
</div>

</div>
 @endsection

 @section('javascript')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! Charts::scripts() !!}
{!! $userChart->script() !!}
{!! $ordersChart->script() !!}
 @endsection
