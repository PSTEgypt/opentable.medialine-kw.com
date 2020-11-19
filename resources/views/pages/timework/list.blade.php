
@extends('layoutDashboard.app',['title'=>' مواعيد العمل    '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة  مواعيد العمل    '])
@if($tables->isEmpty())

@component('components.empty',['section'=>'مواعيد العمل    ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>  اليوم  </th>
            <th> من     </th>
            <th>  الي  </th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($tables as $table)
        <tr>

<th>{{$table->day}}</th>
<th>{{$table->work_from}}</th>
<th>
{{$table->work_to}}
</th>
<th>
<a  href="/restaurant/timework/delete/{{$table->id}}" class="btn btn-block btn-danger btn-flat"> <i class="fa fa-trash" aria-hidden="true"></i>{{trans('dashboard.TableDelete')}}       </a>
<a href="/restaurant/timework/edit/{{$table->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/restaurant/timework/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  مواعيد العمل    </a>
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