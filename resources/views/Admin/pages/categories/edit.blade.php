
@extends('layoutDashboard.app',['title'=>'الاقسام'] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  القسم '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('category.edit.submit',$category->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr">{{trans('dashboard.adminpermissions')}} </label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$category->name}}" name="name">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> الوصف </label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$category->description}}" name="description">
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