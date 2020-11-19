
@extends('layoutDashboard.app',['title'=>trans('dashboard.sectionAdmin')])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>trans('dashboard.sectionAdmin') ])
@if($admins->isEmpty())

@component('components.empty',['section'=>trans('dashboard.sectionAdmin')]) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
 <th>{{trans('dashboard.TableName')}} </th>
<th>{{trans('dashboard.TableEmail')}} </th>           
 <th>{{trans('dashboard.TableType')}} </th>
<th>{{trans('dashboard.TableUpdate')}} </th>       
 <th>{{trans('dashboard.TableDelete')}} </th>
        </tr>
        </thead>
        <tbody>  
@foreach($admins as $admin)
        <tr>
<th> <a href="/admin/admin/info/{{$admin->id}}">{{$admin->name}}</a></th>
<th> {{$admin->email}}</th>
@if($admin->is_admin == 1)
<th> <span class="badge badge-success h3">{{trans('dashboard.TextAdmin')}}</span></th>
@else
<th><span class="badge badge-warning">{{trans('dashboard.TextManager')}} </span>  </a></th>
@endif
<th><a href="/admin/admin/edit/{{$admin->id}}" class="btn btn-block btn-info btn-flat"> {{trans('dashboard.TableUpdate')}} </a></th>
<th><a href="/admin/admin/delete/{{$admin->id}}" class="btn btn-block btn-danger btn-flat"> {{trans('dashboard.TableDelete')}} </a></th>



        </tr>

        @endforeach  
        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/admin/add" class="btn btn-block btn-success btn-lg">
<i class="fa fa-plus" aria-hidden="true"></i> {{trans('dashboard.sectionAdmin')}}   </a>
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
            "lengthMenu":     "",
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