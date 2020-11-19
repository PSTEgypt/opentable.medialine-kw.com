
@extends('layoutDashboard.app',['title'=>'المشرفين'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة المشرفين'])
@if($admins->isEmpty())

@component('components.empty',['section'=>trans('dashboard.sectionAdmin')]) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableName')}} </th>
<th>{{trans('dashboard.TableEmail')}} </th>            <th>{{trans('dashboard.TableType')}} </th>
<th>{{trans('dashboard.TableUpdate')}} </th>            <th>{{trans('dashboard.TableDelete')}} </th>
        </tr>
        </thead>
        <tbody>  
@foreach($admins as $admin)
        <tr>
<th> <a href="/restaurant/emp/info/{{$admin->id}}">{{$admin->name}}</a></th>
<th> {{$admin->email}}</th>
@if($admin->is_super == 1)
<th> <span class="badge badge-success h3">الادمن</span></th>
@else
<th><span class="badge badge-warning">مشرف </span>  </a></th>
@endif
<th><a href="/restaurant/emp/edit/{{$admin->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
<th><a href="/restaurant/emp/delete/{{$admin->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.TableDelete')}} </a></th>



        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>{{trans('dashboard.TableName')}} </th>-->
        <!--    <th>{{trans('dashboard.TableEmail')}} </th>-->
        <!--    <th>{{trans('dashboard.TableType')}} </th>-->
        <!--    <th>{{trans('dashboard.TableEdit')}} </th>-->
        <!--    <th>{{trans('dashboard.TableDelete')}} </th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/restaurant/emp/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}} مسئول  </a>
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
      "ordering": false,
      "autoWidth": false
    });
  });
</script>

 @endsection