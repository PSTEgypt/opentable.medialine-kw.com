
@extends('layoutDashboard.app',['title'=>'المطاعم '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة المطاعم'])
@if($restaurants->isEmpty())

@component('components.empty',['section'=>'المطاعم ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover ">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableName')}} </th>
            <th>{{trans('dashboard.TableEmail')}}   </th>
            <th> الهاتف </th>
            <th> الشعار  </th>

            <th>الافعال</th>
            <th>{{trans('dashboard.TableDelete')}}</th>
        </tr>
        </thead>
        <tbody>  
@foreach($restaurants as $restaurant)

        <tr>
<th> <a href="/admin/restaurant/info/{{$restaurant->id}}">{{$restaurant->name}}</a></th>
<th>{{ $restaurant->email  }} </th>
<th>{{ $restaurant->phone }} </th>
<th><img src="{{asset($restaurant->main_image)}}" width=50px > </th>
<th><a href="/admin/restaurant/edit/{{$restaurant->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
<th><a href="/admin/restaurant/delete/{{$restaurant->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.TableDelete')}} </a></th>

        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>{{trans('dashboard.TableName')}} بالعربي </th>-->
        <!--    <th>{{trans('dashboard.TableName')}} بالانجنبي</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/restaurant/add" class="btn btn-block btn-success btn-lg">
 <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  مطعم  </a>
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