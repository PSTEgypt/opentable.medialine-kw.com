
@extends('layoutDashboard.app',['title'=>'المستخدمين'])
@section('content')
@component('components.panel',['subTitle'=>' بيانات المستخدم'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset($user->image)}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <span>{{$user->email}}</span> <b class="float-right">{{trans('dashboard.TableEmail')}} </b>
                  </li>
                  <li class="list-group-item">
                  <span>{{$user->phone}}</span> <b class="float-right">الهاتف </b>
                  </li>
                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
                    @if($user->is_active == 1)
    <a  href="/admin/user/status/{{$user->id}}" class="btn btn-block btn-success btn-sm">{{trans('dashboard.Active')}}</a>
    @else
    <a  href="/admin/user/status/{{$user->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.Deactive')}}</a>
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



      @component('components.panel',['subTitle'=>'الطالبات السابقة '])
   



@endcomponent
 @endsection