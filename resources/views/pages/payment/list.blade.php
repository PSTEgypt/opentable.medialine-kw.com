@extends('layoutDashboard.app',['title'=>'ادارة الاشتركات' ,'subTitle'=>'ادارة ادارة الاشتركات '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>'  ادارة الاشتركات'])
@if($restaurant_payment->isEmpty())

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableName')}}   </th>
            <th> يبداء من   </th>
            <th> ينتهي في  </th>
            <th>السعر </th>
            <th> حالة الاشتراك</th>
            <th>التاريخ</th>
            <th> الافعال </th>
        </tr>
        </thead>
        <tbody>  
@foreach($restaurant_payment as $payment)
        <tr>
        <th><a href="/admin/restaurant/info/{{$payment->restaurant->id}}"> {{$payment->restaurant->name}}</a></th>  
        <th> {{$payment->from}}</th>  

        <th> {{$payment->to}}</th>  

        <th> {{$payment->price}}</th>  

        @if($payment->is_pay == 1)
        <th><span class="badge bg-success"> تم الدفع </span> </th>
        @else
        <th><span class="badge bg-danger">لم يتم الدفع  </span> </th>
        @endif  

<th>{{Carbon\Carbon::parse($payment->created_at)->format('Y-m-d H:m a')}}</th>
<th>
@if($payment->is_pay == 0)
<a href="/admin/payment/pay/{{$payment->id}}" class="btn btn-block btn-info btn-flat"> دفع  </a>
@endif
<a href="/admin/payment/delete/{{$payment->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.TableDelete')}} </a></th>


          
        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الصورة  </th>-->
        <!--    <th>المبلغ او الرصيد </th-->
        <!--    <th> الحالة </th>-->
        <!--    <th>المستخدم</th>-->
        <!--    <th> المندوب</th>-->
        <!--    <th>التاريخ</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif
@slot('footer')
<div class="col-lg-4">

<a  href="/admin/payment/add" class="btn btn-block btn-success btn-lg">
 <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  اشتراك  </a>
</div>
@endslot
@endcomponent




 @endsection     

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
  $(function () {

    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });


  $(function () {

$('#example3').DataTable({
    "language": {
        "paginate": {
            "next": "{{trans('dashboard.TableNext')}}",
             "previous" : "{{trans('dashboard.TableBefore')}}"
        }
    },
  "info" : true,
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "autoWidth": false
});
});
</script>

 @endsection