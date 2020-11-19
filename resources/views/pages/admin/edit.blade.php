@extends('layoutDashboard.app',['title'=>trans('dashboard.sectionAdmin')])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

@component('components.panel',['subTitle'=>trans('dashboard.sectionAdmin')])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('admin.edit.submit',$admin->id)}}" method="post" id="formAdmin" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr">{{trans('dashboard.adminpermissions')}} </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name" value="{{$admin->name}}">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn">{{trans('dashboard.TableEmail')}} </label>
                    <input type="text" class="form-control" id="InputNameEn"  name="email" value="{{$admin->email}}">
                  </div>

                  <div class="form-group">
                    <label for="Inputpassword">{{trans('dashboard.TablePassword')}} </label>
                    <input type="text" class="form-control" id="Inputpassword"  name="password" >
                  </div>

                  <div class="form-group">
                  <div class="form-check">
                  @if($admin->is_admin  == 1)
                    <input type="checkbox" class="form-check-input" id="admin" value=1   name="admin" checked>
                    @else
                    <input type="checkbox" class="form-check-input" id="admin" value=1   name="admin" >
                    @endif
                    <label class="form-check-label" for="exampleCheck1">{{trans('dashboard.TextAdmin')}}</label>
                  </div>
                  </div> 
                  </div>                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('dashboard.TextSend')}}</button>
                </div>
             

   

          </form>
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
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>{{trans('dashboard.TableCategory')}}  </th>-->
        <!--    <th>{{trans('dashboard.TableAdd')}} </th>-->
        <!--    <th>{{trans('dashboard.TableEdit')}}  </th>-->
        <!--    <th>{{trans('dashboard.TableDelete')}}  </th>-->
        <!--</tr>-->
        <!--</tfoot>-->
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
            }
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
<script>
$('input[type="checkbox"][name="admin"]').change(function() {
     if(this.checked) {
      $("input[type=checkbox]").not('#admin').prop('checked', $(this).prop('checked')).attr("disabled", true);
     }else{
      $("input[type=checkbox]").not('#admin').prop('checked', false).attr("disabled", false);
     }
 });

</script>
 @endsection



