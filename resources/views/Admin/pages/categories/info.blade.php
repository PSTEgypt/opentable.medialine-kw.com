
@extends('layoutDashboard.app',['title'=>'الاقسام'] )
@section('content')

@component('components.panel',['subTitle'=>'  بيانات القسم '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$category->name}}</span> <b class="float-right">{{trans('dashboard.TableName')}}    </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$category->description}}</span> <b class="float-right">  الوصف  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($category->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
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