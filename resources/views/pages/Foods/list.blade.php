
@extends('layoutDashboard.app',['title'=>' الوجبات  '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة  الوجبات  '])
@if($ads->isEmpty())

@component('components.empty',['section'=>'الوجبات  ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>
            <th{{trans('dashboard.TableName')}}   </th>
            <th>  الوصف </th>
            <th>السعر  </th>
            <th>الافعال</th>
            <th>{{trans('dashboard.TableDelete')}}</th>
        </tr>
        </thead>
        <tbody>  
@foreach($ads as $ad)
        <tr>

<th><img src="{{asset($ad->image)}}" width=50px > </th>
<th>{{$ad->name}}</th>
<th>{{$ad->description}}</th>
<th>{{$ad->price}}</th>

<th><a href="/restaurant/food/edit/{{$ad->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
<th><a href="/admin/ad/edit/{{$ad->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.TableDelete')}} </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/restaurant/food/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  وجبة  </a>
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