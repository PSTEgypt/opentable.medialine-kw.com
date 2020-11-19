
@extends('layoutDashboard.app',['title'=>trans('dashboard.sectionAdmin')])
@section('content')

@component('components.panel',['subTitle'=>trans('dashboard.sectionAdmin')])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$admin->name}}</span> <b class="float-right">{{trans('dashboard.TableName')}}    </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$admin->email}}</span> <b class="float-right">{{trans('dashboard.TableEmail')}} </b>
                  </li>


                </ul>
                @if($admin->is_admin == 1)
                <li class="list-group-item">
                <span class="badge badge-success h3">{{trans('dashboard.TextAdmin')}}</span><b class="float-right">trans('dashboard.adminpermissions') </b>
                  </li>
                @else
                <li class="list-group-item">
                <span class="badge badge-warning h3">{{trans('dashboard.TextManager')}}</span> <b class="float-right">trans('dashboard.adminpermissions') </b>
                  </li>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent
      @if($admin->is_admin == 0)

@component('components.panel',['subTitle'=>trans('dashboard.adminpermissions')])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableCategory')}}  </th>
            <th>{{trans('dashboard.TableAdd')}} </th>
            <th>{{trans('dashboard.TableEdit')}}  </th>
            <th>{{trans('dashboard.TableDelete')}}  </th>
        </tr>
        </thead>
        <tbody>  

    @component('components.tableCheckbox',['title'=>trans('dashboard.TypeOfResturant'),'name'=>'type','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>trans('dashboard.sectionRestaurant'),'name'=>'restaurants','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>trans('dashboard.sectionUsers'),'name'=>'users','permissions'=>$permissions])@endcomponent 
@component('components.tableCheckbox',['title'=>trans('dashboard.subscriptionManagement'),'name'=>'payment','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>trans('dashboard.webSetting'),'name'=>'webSetting','permissions'=>$permissions])@endcomponent






       
        </tbody>
        <tfoot>
        <tr>
            <th>{{trans('dashboard.TableCategory')}}  </th>
            <th>{{trans('dashboard.TableAdd')}} </th>
            <th>{{trans('dashboard.TableEdit')}}  </th>
            <th>{{trans('dashboard.TableDelete')}}  </th>
        </tr>
        </tfoot>
        </table>



@endcomponent
@endif
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
            "lengthMenu":     "_MENU_",
        },
      "info" : true,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "autoWidth": false
    });
  });
</script>
 @endsection
