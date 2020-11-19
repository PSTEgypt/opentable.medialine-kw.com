@extends('layoutDashboard.app',['title'=>' الاعدادات'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' ادارة الاعدادات'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('appSetting.edit')}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr">  عن التطبيق بالعربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value="{{$appSetting->about_us_ar}}" name="about_us_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  عن التطبيق بالانجليزي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$appSetting->about_us_en}}" name="about_us_en">
                  </div>

                  <div class="form-group">
                    <label for="InputNameAr">  سياسة التطبيق بالعربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value="{{$appSetting->policy_term_ar}}" name="policy_term_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  سياسة التطبيق بالانجليزي </label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$appSetting->policy_term_en}}" name="policy_term_en">
                  </div>



                  <div class="form-group">
                    <label for="InputNameAr"> نقطة لطلب جديد</label>
                    <input type="text" class="form-control" id="InputNameAr" value="{{$appSetting->point_for_new_order}}" name="point_for_new_order">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">نقطة للتصنيف</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$appSetting->point_for_rating}}" name="point_for_rating">
                  </div>


                  <div class="form-group">
                    <label for="InputNameAr">  الحد الأدنى لقبول النظام</label>
                    <input type="text" class="form-control" id="InputNameAr" value="{{$appSetting->minimum_to_accept_order}}" name="minimum_to_accept_order">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  رسوم</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$appSetting->fees}}" name="fees">
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
          
      @endcomponent




@component('components.panel',['subTitle'=>' ادارة  الهاتف'])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الهاتف</th>
            <th>الحالة</th>
            <th>الافعال</th>
            <th>{{trans('dashboard.TableDelete')}}</th>
        </tr>
        </thead>
        <tbody>  
@foreach($appPhones as $appPhone)
        <tr>

<th> {{$appPhone->phone}}</th>


<th>{{Carbon\Carbon::parse($appPhone->created_at)->diffForHumans()}}</th>
<th><a href="/phone/edit/{{$appPhone->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
<th><a href="/phone/delete/{{$appPhone->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.TableDelete')}} </a></th>
        </tr>

        @endforeach  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th> الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>الافعال</th>-->
        <!--    <th>{{trans('dashboard.TableDelete')}}</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>



@slot('footer')
<div class="col-lg-4">

<a  href="/phone/add/" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  هاتف  </a>
</div>
@endslot

@endcomponent



@component('components.panel',['subTitle'=>' ادارة  الايميل '])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>{{trans('dashboard.TableEmail')}} </th>
            <th>الحالة</th>
            <th>الافعال</th>
            <th>{{trans('dashboard.TableDelete')}}</th>
        </tr>
        </thead>
        <tbody>  
@foreach($appEmails as $appEmail)
        <tr>

<th> {{$appEmail->email}}</th>


<th>{{Carbon\Carbon::parse($appEmail->created_at)->format('Y-m-d H:m a')}}</th>
<th><a href="/email/edit/{{$appEmail->id}}" class="btn btn-block btn-info btn-flat">{{trans('dashboard.TableEdit')}} </a></th>
<th><a href="/email/delete/{{$appEmail->id}}" class="btn btn-block btn-danger btn-flat">{{trans('dashboard.TableDelete')}} </a></th>
        </tr>

        @endforeach  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>{{trans('dashboard.TableEmail')}} </th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>الافعال</th>-->
        <!--    <th>{{trans('dashboard.TableDelete')}}</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>



@slot('footer')
<div class="col-lg-4">

<a  href="/email/add/" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  ايميل   </a>
</div>
@endslot

@endcomponent
 @endsection