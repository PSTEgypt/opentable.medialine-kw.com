
@extends('layoutDashboard.app',['title'=>' الطاولات   '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة  الطاولات   '])
@if($tables->isEmpty())

@component('components.empty',['section'=>'الطاولات   ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> رقم الطاولة  </th>
            <th> عدد الاشخاص    </th>
            <th>  النوع  </th>
            <th>{{trans('dashboard.userManagment')}}   </th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($tables as $table)
        <tr>

<th>{{$table->table_id}}</th>
<th>{{$table->count_from}}  - {{ $table->count_to}}</th>
<th>
 
<span class="badge badge-success h3">{{$table->tableType->name}}  </span>
</th>

@if($table->is_active == 1)
<th><a  href="/restaurant/table/status/{{$table->id}}" class="btn btn-block btn-success btn-sm">{{trans('dashboard.Active')}}</a></th>
@else
<th><a  href="/restaurant/table/status/{{$table->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.Deactive')}}</a></th>
@endif
<th><a href="/restaurant/table/edit/{{$table->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/restaurant/table/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  طاولة   </a>
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
</script>

 @endsection