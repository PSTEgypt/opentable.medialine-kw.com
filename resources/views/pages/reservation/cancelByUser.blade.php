
@extends('layoutDashboard.app',['title'=>'الحجزات' ,'subTitle'=>'ادارة الحجزات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')






@component('components.panel',['subTitle'=>' بيانات الحجز المرفوضة من  المستخدم '])
@if($cancelByuser->isEmpty())

@component('components.empty',['section'=>'الحجزات مرفوضة من  المستخدم  ']) @endcomponent

@else 

<table id="example4" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>رقم الحجز  </th>
            <th>اسم المستخدم</th>
            <th> رقم الطاولة </th>
            <th>عدد الاشخاص </th>
            <th>التاريخ</th>
            <th>الميعاد</th>
            <th>تاريخ انشاء الحجز </th>

        </tr>
        </thead>
        <tbody>  
@foreach($cancelByuser as $reservation )
        <tr>
        <th> {{$reservation->id}}</th>
       
<th> <a href="/restaurant/reservation/user/info/{{$reservation->user->id}}">{{$reservation->user->name}}</th>
<th> {{$reservation->table->table_id}}</th>
<th>{{$reservation->count}} </th>
<th> {{$reservation->date}}</th>
<th> {{$reservation->time}}</th>
<th>{{Carbon\Carbon::parse($reservation->created_at)->format('Y-m-d H:m a')}}</th>

          
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
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif
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
            },
            "search":"{{trans('dashboard.TableSearch')}}:",
            "lengthMenu":     " ",
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });

    $('#example3').DataTable({
        "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",
            "lengthMenu":     " ",
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });



    $('#example4').DataTable({
        "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",
            "lengthMenu":     " ",
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });



    $('#example5').DataTable({
        "language": {
            "paginate": {
                "next": "{{trans('dashboard.TableNext')}}",
                 "previous" : "{{trans('dashboard.TableBefore')}}"
            },
            "search":"{{trans('dashboard.TableSearch')}}:",
            "lengthMenu":     " ",
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