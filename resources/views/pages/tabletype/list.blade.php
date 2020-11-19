
@extends('layoutDashboard.app',['title'=>'انواع الطاولة  '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة انواع الطاولة   '])
@if($types->isEmpty())

@component('components.empty',['section'=>'انواع الطاولة   ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableName')}} </th>
       
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($types as $type)
        <tr>
<th> <a href="/restaurant/tableType/info/{{$type->id}}">{{$type->name}}</a></th>

<th><a href="/restaurant/tableType/edit/{{$type->id}}" class="btn  btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>

        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>{{trans('dashboard.TableName')}} بالعربي </th>-->
        <!--    <th>{{trans('dashboard.TableName')}} بالانجنبي</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/restaurant/tableType/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}} نوع  </a>
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