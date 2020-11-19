
@extends('layoutDashboard.app',['title'=>'المطعم  '] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
<!-- font -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css"><link rel="stylesheet" href="{{asset('dist/dist/jquery.fileuploader.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  تعديل  بيانات   المطعم  '])
<div class="container-fluid">
        <div class="row">
        <div class="col-md-12 ">
<div class="text-center">

<img src="{{asset($restaurant->main_image)}}" width=150px>
</div>
          <div class="col-md-12 ">

          <form   
      role="form" action="{{route('admin.restaurant.edit.submit',$restaurant->id)}}" method="post" enctype="multipart/form-data" >
          @csrf

             <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="InputNameAr">{{trans('dashboard.adminpermissions')}} المطعم </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name" value="{{$restaurant->name}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameAr">  البريد الالكتروني  </label>
                    <input type="email" class="form-control" id="InputNameAr"  name="email" value="{{$restaurant->email}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameAr">  كلمة المرور </label>
                    <input type="password" class="form-control" id="InputNameAr"  name="password">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameAr">   رقم الهاتف  </label>
                    <input type="number" class="form-control" id="InputNameAr"  name="phone" value="{{$restaurant->phone}}">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameAr">   facebook   </label>
                    <input type="url" class="form-control" id="InputNameAr"  name="facebook" value="{{$restaurant->facebook}}">
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameAr">   instgram   </label>
                    <input type="url" class="form-control" id="InputNameAr"  name="instgram" value="{{$restaurant->instgram}}">
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameAr">   youtube   </label>
                    <input type="url" class="form-control" id="InputNameAr"  name="youtube" value="{{$restaurant->youtube}}"> 
                  </div>



                  <div class="form-group col-md-6">
                    <label for="InputNameEn"> وصف  المطعم </label>
                    <textarea id="some-textarea1" class="form-control"   name="description" placeholder=" وصف المطعم" >
                      {{$restaurant->description}}
                    </textarea>

                  </div>
                  <div class="form-group col-md-6">
                    <label for="InputNameEn">   نوع المطعم     </label>
                    
                    <select name="types[]" class="form-control js-example-responsive" multiple="multiple" >
                 
                  @foreach($types as $type)
                  @if(!$restaurant->types->isEmpty())
                    @foreach($restaurant->types as $reType)
                    @if($reType->id == $type->id)
                    <option value="{{$type->id}}" selected>{{$type->name}}</option>               

                    @else 
                    <option value="{{$type->id}}" >{{$type->name}}</option>               

                    @endif
                    @endforeach
                @else 
                <option value="{{$type->id}}" >{{$type->name}}</option>               

@endif
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameEn">    فيديو المطعم   </label>
                    @if($restaurant->Vedios )

                    @foreach($restaurant->Vedios as $Vedio)
                    <p> <input type='text' class='form-control' value="{{$Vedio->vedio}}"   name='url[]' style='width:97%;margin-top:10px'>
                      <span class='remove_fieldurl' style='float: left;padding: 0px;display: inline;position: relative;top: -35px;width: 11px;height: 28px;font-weight: bolder;'>x</span> 
                    </p>
                    @endforeach

                    @endif

                    <span class="btn btn-info"  id="addListUrl" style='margin-top:10px'>{{trans('dashboard.TableAdd')}} </span>

                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameEn">   الخدمات المتاحة  </label>
                    @if($restaurant->services )

                    @foreach($restaurant->services as $services)
                    <p> <input type='text' class='form-control' value="{{$services->name}}"   name='services[]' style='width:97%;margin-top:10px'>
                      <span class='remove_field' style='float: left;padding: 0px;display: inline;position: relative;top: -35px;width: 11px;height: 28px;font-weight: bolder;'>x</span> 
                    </p>
                    @endforeach

                    @endif

                    <span class="btn btn-info"  id="addList" style='margin-top:10px'>{{trans('dashboard.TableAdd')}} </span>

                  </div>
<hr>
                  <p style="
                      font-size: 23px;
                      font-weight: bold;
                  ">نوع الخدمة</p>


                  <div class="checkbox col-md-6">
                  <input type="checkbox" 
                   name="is_reversation"  
                   id="reservation" value='reservation'
                    checked="{{$restaurant->category->where('category','reservation')->first() == null ? :true }}"
                  > 
                  <span>خدمة الحجز  </span>
                  </div>
              

                  <div id="showreservation" >
                 <div class="form-group col-md-6">
                    <label for="InputNameEn">   متوسط حجز الطاوله   </label>
                    <input type="number"  class="form-control" id="InputNameEn" value="{{$restaurant->category->where('category','reservation')->first() == null ? : $restaurant->category->where('category','reservation')->first()->reservation_count}}" name="reservation_count">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameEn">  (دقيقة) وقت الغاء الحجز في حاله عدم الغاء الحجز   </label>
                    <input type="number"  class="form-control" id="InputNameEn" value="{{$restaurant->category->where('category','reservation')->first() == null ? : $restaurant->category->where('category','reservation')->first()->reservation_time}}" name="reservation_time" >
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameEn">    قيمةالدفعة المسبقة للحجز   </label>
                    <input type="number"  class="form-control" id="InputNameEn" value="{{$restaurant->category->where('category','reservation')->first() == null ? : $restaurant->category->where('category','reservation')->first()->reservation_price}}"  name="reservation_price">
                  </div>
 </div>                  

 <div class="checkbox col-md-6">
                  
                  <input type="checkbox" name="is_delivery" id='delivery' value="delivery" 
                  checked="{{$restaurant->category->where('category','delivery')->first() == null ? : $restaurant->category->where('category','delivery')->first() == null ?  :true }}"
                  > 
                  <span>خدمة توصيل الطلبات  </span>


                  </div>

                  <div id="showdelivery" >
  
                      <div class="form-group col-md-6">
                    <label for="InputNameEn">    تكلفة التوصيل      </label>
                    <input type="number"  class="form-control" id="InputNameEn" 
                     name="delivery_price" value="{{$restaurant->category->where('category','delivery')->first() == null ? : $restaurant->category->where('category','delivery')->first()->delivery_price}}">
                  </div>
</div>


<div class="checkbox col-md-6">
                  <input type="checkbox"   name="is_crub"  value="crub"
                  checked="{{$restaurant->category->where('category','crub')->first() == null ? :$restaurant->category->where('category','crub')->first() == null ?  :true }}"
                   >
                  <span> خدمة الرصيف  </span>
                  </div>
</br>

                  <div class="form-group col-md-6">

                    <label for="InputFile"> شعار   المطعم </label>
                    <div class="imageupload panel panel-default">
                  <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                          <span>{{trans('dashboard.TableAdd')}} </span>
                          <!-- The file is stored here. -->
                          <input type="file" name="main_image">
                      </label>

                      <button type="button" class="btn btn-default">{{trans('dashboard.TableDelete')}}</button>
                  </div>

                  <div class="url-tab panel-body">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Image URL">
                      </div>
                      <button type="button" class="btn btn-default">لالبابلابل</button>
                      <!-- The URL is stored here. -->
                      <input type="hidden" name="image">
                  </div>
                  </div>
                  </div>


              

                  <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{trans('dashboard.TextSend')}}</button>
        </div>


                </div>
                <!-- /.card-body -->
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
      @endcomponent

@component('components.panel',['subTitle'=>'ادارة صور المطعم '])

    <div class="col-lg-12">
@foreach($restaurant->images as $images)

<div class="col-lg-3" style="display:inline-block">
    <div class="thumbnail">
      <img src="{{$images->image}}" alt="..." width="150px" height="150px">
      <div class="caption">

        <p class="text-center" style="margin-top:10px">
        <form   
      role="form" action="{{route('restaurant.delete.image',$images->id)}}" method="post" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="action" value="delete" />

        <button type="submit" class="btn btn-danger"  role="button">{{trans('dashboard.TableDelete')}}</button></p>
        </form>
      </div>
    </div>
  </div>

@endforeach


      <form   
      role="form" action="{{route('restaurant.add.image',$restaurant->id)}}" method="post" enctype="multipart/form-data" >
          @csrf

      <div class="form-group">
            

            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
    <label>{{trans('dashboard.TableAdd')}} صور للمنتج <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>

    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="اضافة صور " name="images[]" >
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>
                           </div>

                           <input type="hidden" name="action" value="add" />

                           <div class="card-footer">
          <button type="submit" class="btn btn-info">{{trans('dashboard.TableAdd')}} </button>
        </div>

        </form>
  </div>
      @endcomponent



 @endsection









 
        

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('dist/js/bootstrap-imageupload.js')}}"></script>

<script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script><script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();

});
var upload = new FileUploadWithPreview('myUniqueUploadId',{
  showDeleteButtonOnImages: true,
                text: {
                    chooseFile: 'اضافة صور   ',
                    browse: '  اضافة صور ',
                    selectedCount: 'Custom Files Selected Copy',
                },
})

$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});

$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});



$('#addList').click(function(){
  $('#addList').before( "<p> <input type='text' class='form-control'   name='services[]' style='width:97%;margin-top:10px'><span class='remove_field' style='float: left;padding: 0px;display: inline;position: relative;top: -35px;width: 11px;height: 28px;font-weight: bolder;'>x</span> </p>");
});
 
 $(document).on('click', 'span.remove_field', function () {
                $(this).closest('p').remove();
            });



 $(document).on('change', '#reservation', function() {
    if(this.checked) {

      $('#showreservation').attr('hidden',false);
    }else{
            $('#showreservation').attr('hidden',true);

    }
});


  $(document).on('change', '#delivery', function() {
    if(this.checked) {

      $('#showdelivery').attr('hidden',false);
    }else{
            $('#showdelivery').attr('hidden',true);

    }
});





$('#addListUrl').click(function(){
  $('#addListUrl').before( "<p> <input type='text' class='form-control'   name='url[]' style='width:97%;margin-top:10px'><span class='remove_fieldurl' style='float: left;padding: 0px;display: inline;position: relative;top: -35px;width: 11px;height: 28px;font-weight: bolder;'>x</span> </p>");
});
 $(document).on('click', 'span.remove_fieldurl', function () {
                $(this).closest('p').remove();
            });
</script>


 @endsection
