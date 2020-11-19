@extends('layoutDashboard.app',['title'=>'ادارة الاشتركات' ,'subTitle'=>'ادارة ادارة الاشتركات '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>'  المطاعم غير المشتركة '])
@if($notSubrestaurant_payment->isEmpty())

@else 
<table id="example3" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableName')}}   </th>
            <th>التاريخ</th>
        </tr>
        </thead>
        <tbody>  
@foreach($notSubrestaurant_payment as $restaurant)
        <tr>
        <th><a href="/admin/restaurant/info/{{$restaurant->id}}"> {{$restaurant->name}}</a></th>  
     
<th>{{Carbon\Carbon::parse($restaurant->created_at)->format('Y-m-d H:m a')}}</th>


          
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