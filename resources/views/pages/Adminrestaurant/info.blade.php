
@extends('layoutDashboard.app',['title'=>' المطعم'] )
@section('content')

@component('components.panel',['subTitle'=>'    بيانات المطعم '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <a style="margin-bottom:10px"class="btn btn-primary btn-larg" 
                href="/restaurant/edit/">{{trans('dashboard.TableEdit')}} البيانات</a>
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px"  style="margin-bottom:50px"src="{{asset($restaurant->main_image)}}" alt="User profile picture">
                </div>



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$restaurant->name}}</span> <b class="float-right">اسم المطعم     </b>
                  </li>

                     <li class="list-group-item">
                    <span>{{$restaurant->email}}</span> <b class="float-right">{{trans('dashboard.TableEmail')}}     </b>
                  </li>

                    <li class="list-group-item">
                                       <b class="float-right">نوع الخدمة      </b>

                      @foreach($restaurant->category as $category)
                        @if($category->category == 'reservation')
                         <b>
                        حجزات 
                        </b>
                        <br>
                       <span>
                         سعر الخدمة : {{$category->reservation_price}} 

                        </span>
                                  <br>
                                                                        <span>
                      متوسط حجز الطاوله :  {{$category->reservation_count}} 

                        </span>
 <br>
                                                                                               <span>
                        سعر الخدمة  : {{$category->reservation_time}}

                        </span>
                        <br>
                        <hr>
                        @elseif($category->category == 'delivery')

                         <b>
                        توصيل طلبات  
                        </b>
                        <br>
                       <span>
                         تكلفة التوصيل   : {{$category->delivery_price}} 

                        </span>
   

                        @elseif($category->category == 'curb')
                                      <b>عربية طعام </b>           
                        @else
لايوجد
                        @endif
                      @endforeach
                  </li>

                     <li class="list-group-item">
                    <span>@foreach($restaurant->types as $type) {{$type->name}},@endforeach</span> <b class="float-right">التصنيف    </b>
                  </li>


                  <li class="list-group-item">
                  <b class="float-right">وصف المطعم     </b>
                    <span>{{$restaurant->description}}</span> 
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($restaurant->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
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



      @component('components.panel',['subTitle'=>' صور المطعم'])


<div class="col-lg-12">
@foreach($restaurant->images as $images)

<div class="col-lg-3" style="display:inline-block">
<div class="thumbnail">
  <img src="{{asset($images->image)}}" alt="..." width="150px" height="150px">
  <div class="caption">
    </form>
  </div>
</div>
</div>

@endforeach

  @endcomponent


  @component('components.panel',['subTitle'=>' التواصل  '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">


                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$restaurant->phone}}</span> <b class="float-right">رقم الهاتف     </b>
                  </li>

                                       <li class="list-group-item">
                    <span>{{$restaurant->facebook}}</span> <b class="float-right"> facebook   </b>
                  </li>

                                       <li class="list-group-item">
                    <span>{{$restaurant->youtube}}</span> <b class="float-right">youtube    </b>
                  </li>

                                       <li class="list-group-item">
                    <span>{{$restaurant->instgram}}</span> <b class="float-right"> instgram   </b>
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





  @component('components.panel',['subTitle'=>' الخدمات المتاحة   '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">


                <ul class="list-group list-group-unbordered mb-3">
@foreach($restaurant->services  as $services )
                     <li class="list-group-item">
                   <b class="float-right">  {{$services->name}}    </b>
                  </li>
@endforeach
                  
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




  @component('components.panel',['subTitle'=>' وجبات المطعم '])

  <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>
            <th{{trans('dashboard.TableName')}}   </th>
            <th>  الوصف </th>
            <th>السعر  </th>
        </tr>
        </thead>
        <tbody>  
@foreach($restaurant->food as $food)
        <tr>

<th><img src="{{asset($food->image)}}" width=50px > </th>
<th>{{$food->name}}</th>
<th>{{$food->description}}</th>
<th>{{$food->price}}</th>

        </tr>

        @endforeach  

        </tbody>

        </table>
  @endcomponent

 @endsection