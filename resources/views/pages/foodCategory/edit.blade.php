
@extends('layoutDashboard.app',['title'=>'الاصناف '] )
@section('content')

@component('components.panel',['subTitle'=>'   تعديل الاصناف   '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('foodCategory.edit.submit',$type->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="InputNameAr">{{trans('dashboard.adminpermissions')}} </label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$type->name}}" name="name">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('dashboard.TextSend')}}</button>
                </div>
              </form>
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


 @endsection