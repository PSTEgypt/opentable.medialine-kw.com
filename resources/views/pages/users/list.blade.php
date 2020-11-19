
@extends('layoutDashboard.app',['title'=>trans('dashboard.Users') ,'subTitle'=>trans('dashboard.userManagment')])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>trans('dashboard.Users')])
@if($users->isEmpty())

@component('components.empty',['section'=>'مستخدميين ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> @lang('dashboard.TableName')  </th>
            <th> {{trans('dashboard.TableEmail')}} </th>
            <th>  {{trans('dashboard.TableImage')}} </th>
            <th> {{trans('dashboard.TablePhone')}} </th>
            <th> {{trans('dashboard.TableStatus')}} </th>
        </tr>
        </thead>
        <tbody>  
@foreach($users as $user)
        <tr>
<th> <a href="/admin/user/info/{{$user->id}}">{{$user->name}}</th>
<th> {{$user->email}}</th>
<th><img src="{{asset($user->image)}}" width=50px > </th>
<th> {{$user->phone}}</th>
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
  });
</script>

 @endsection