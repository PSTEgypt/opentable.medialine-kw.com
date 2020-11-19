
@extends('layoutDashboard.app',['title'=>'المطاعم '] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
<!-- font -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css"><link rel="stylesheet" href="{{asset('dist/dist/jquery.fileuploader.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  اضافة بيانات   المطعم '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form   
      role="form" action="{{route('admin.restaurant.add.submit')}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="InputNameAr">{{trans('dashboard.adminpermissions')}} المطعم </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="name_en">{{trans('dashboard.name_en')}} </label>
                    <input type="text" class="form-control" id="name_en"  name="name_en">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameAr">  البريد الالكتروني  </label>
                    <input type="email" class="form-control" id="InputNameAr"  name="email">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameAr">  كلمة المرور </label>
                    <input type="password" class="form-control" id="InputNameAr"  name="password">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameAr">   رقم الهاتف  </label>
                    <input type="number" class="form-control" id="InputNameAr"  name="phone">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameAr">   facebook   </label>
                    <input type="url" class="form-control" id="InputNameAr"  name="facebook">
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameAr">   instgram   </label>
                    <input type="url" class="form-control" id="InputNameAr"  name="instgram">
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameAr">   youtube   </label>
                    <input type="url" class="form-control" id="InputNameAr"  name="youtube">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameEn">   نوع المطعم     </label>
                    
                    <select name="types[]" class="form-control js-example-responsive" multiple="multiple" >
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>               
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameEn"> وصف  المطعم </label>
                    <textarea id="some-textarea1" class="form-control"   name="description" placeholder=" وصف المطعم" style="styles to copy to the iframe"></textarea>

                  </div>

                  <div class="form-group col-md-6">
                    <label for="InputNameEn">    فيديو المطعم  </label>

                      <input type="text" class="form-control" style="width:97%;"  name="url[]" >

                    <span class="btn btn-info"  id="addListUrl" style='margin-top:10px'>{{trans('dashboard.TableAdd')}} </span>

                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="InputNameEn">   الخدمات المتاحة  </label>

                      <input type="text" class="form-control" style="width:97%;"  name="services[]" >

                    <span class="btn btn-info"  id="addList" style='margin-top:10px'>{{trans('dashboard.TableAdd')}} </span>

                  </div>
<hr>
                  <p style="
                      font-size: 23px;
                      font-weight: bold;
                  ">نوع الخدمة</p>

                  <div class="checkbox col-md-6">
                  <input type="checkbox"  name="is_reversation"  id="reservation" value='reservation'> 
                  <span>خدمة الحجز  </span>
                  </div>

<div id="showreservation" hidden>
                 <div class="form-group col-md-6">
                    <label for="InputNameEn">   متوسط حجز الطاوله   </label>
                    <input type="number"  class="form-control" id="InputNameEn"  name="reservation_count">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameEn">  (دقيقة) وقت الغاء الحجز في حاله عدم الغاء الحجز   </label>
                    <input type="number"  class="form-control" id="InputNameEn"  name="reservation_time" >
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameEn">    قيمةالدفعة المسبقة للحجز   </label>
                    <input type="number"  class="form-control" id="InputNameEn"  name="reservation_price">
                  </div>
 </div>





                  <div class="checkbox col-md-6">
                  
                  <input type="checkbox" name="is_delivery" id='delivery' value="delivery" > 
                  <span>خدمة توصيل الطلبات  </span>


                  </div>

                  <div id="showdelivery" hidden>
  
                      <div class="form-group col-md-6">
                    <label for="InputNameEn">    تكلفة التوصيل      </label>
                    <input type="number"  class="form-control" id="InputNameEn"  name="delivery_price">
                  </div>
</div>


                  <div class="checkbox col-md-6">
                  <input type="checkbox"   name="is_crub"  value="crub">
                  <span> خدمة الرصيف  </span>


                  </div>
<hr>
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



                  <div class="form-group col-md-6">
            

            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
    <label>{{trans('dashboard.TableAdd')}} صور للمطعم <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>

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

$('.imageupload2').imageupload({
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
