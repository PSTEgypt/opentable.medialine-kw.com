@extends('layoutDashboard.app',['title'=>trans('dashboard.sectionAdmin')])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('admin.add.submit')}}" method="post" id="formAdmin"  enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> {{trans('dashboard.TableName')}} </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> {{trans('dashboard.TableEmail')}} </label>
                    <input type="text" class="form-control" id="InputNameEn"  name="email">
                  </div>

                  <div class="form-group">
                    <label for="Inputpassword">   {{trans('dashboard.TablePassword')}}  </label>
                    <input type="text" class="form-control" id="Inputpassword"  name="password">
                  </div>

                  <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="admin" value=1    name="admin">
                    <label class="form-check-label" for="exampleCheck1"> {{trans('dashboard.TextAdmin')}} </label>
                  </div>
                  </div>
                  
                  

                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('dashboard.TableAdd')}} </button>
                </div>
              </form>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      @endcomponent
      
      
      
@component('components.panel',['subTitle'=>trans('dashboard.adminpermissions')])
   <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableSection')}}  </th>
            <th> {{trans('dashboard.TableAdd')}}  </th>
            <th> {{trans('dashboard.TableUpdate')}}   </th>
            <th> {{trans('dashboard.TableDelete')}}   </th>
        </tr>
        </thead>
        <tbody>  
        

@component('components.checkbox',['title'=>trans('dashboard.TypeOfResturant'),'name'=>'type','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>trans('dashboard.RestuarantManagment'),'name'=>'restaurants','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>trans('dashboard.userManagment'),'name'=>'users','permissions'=>0])@endcomponent 
@component('components.checkbox',['title'=>trans('dashboard.subscriptionManagement'),'name'=>'payment','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>trans('dashboard.webSetting'),'name'=>'webSetting','permissions'=>0])@endcomponent


       
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

@section('javascript')
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
 @endsection
 