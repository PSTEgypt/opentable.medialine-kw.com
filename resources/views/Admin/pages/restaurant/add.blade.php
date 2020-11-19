  @extends('Admin.index')
@section('content')

@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
<!-- font -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css"><link rel="stylesheet" href="{{asset('dist/dist/jquery.fileuploader.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection



   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">

<a  href="/admin/restaurant/add" class="btn btn-success  "> <i class="fa fa-plus" aria-hidden="true"></i>{{trans('dashboard.TableAdd')}}  نوع مطعم   </a></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">pages</li>
                            <li class="breadcrumb-item active">Table basic</li>
                        </ol>
                    </div>
                    <div>
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">

                               <form   
      role="form" action="{{route('admin.restaurant.add.submit')}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">


                  <div class="form-group col-md-6">
                    <label for="InputNameAr">{{trans('dashboard.adminpermissions')}}  </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="name_en">{{trans('dashboard.restaurantname_en')}} </label>
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
                      text-align: right;
                  ">نوع الخدمة</p>

             
                                   


                                   
                          

                  <div class="checkbox col-md-6">

                  <input type="checkbox" id="basic_checkbox_1"   name="is_reversation" value='reservation'>
                              <label for="basic_checkbox_1"> خدمة الحجز </label>
                                    
                  </div>

<div id="showreservation" hidden>
                 <div class="form-group col-md-6">
                    <label for="InputNameEn30">   متوسط حجز الطاوله   </label>
                    <input type="number"  class="form-control" id="InputNameEn30"  name="reservation_count">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameEn30">  (دقيقة) وقت الغاء الحجز في حاله عدم الغاء الحجز   </label>
                    <input type="number"  class="form-control" id="InputNameEn30"  name="reservation_time" >
                  </div>


                    <div class="form-group col-md-6">
                    <label for="InputNameEn30">    قيمةالدفعة المسبقة للحجز   </label>
                    <input type="number"  class="form-control" id="InputNameEn30"  name="reservation_price">
                  </div>
 </div>





                  <div class="checkbox col-md-6">
                  
                    <input type="checkbox" id="basic_checkbox_2"   name="is_delivery" value='delivery'>
                              <label for="basic_checkbox_2"> خدمة توصيل الطلبات   </label>




                  </div>

                  <div id="showdelivery" hidden>
  
                      <div class="form-group col-md-6">
                    <label for="InputNameEn">    تكلفة التوصيل      </label>
                    <input type="number"  class="form-control" id="InputNameEn"  name="delivery_price">
                  </div>
</div>


                  <div class="checkbox col-md-6">
                  <input type="checkbox" id="basic_checkbox_3"   name="is_crub" value='crub'>
                     <label for="basic_checkbox_3"> خدمة الرصيف    </label>




                  </div>
<hr>
                  <div class="form-group col-md-6">

                    <label for="InputFile"> شعار   المطعم </label>
                    <div class="imageupload panel panel-default">
                  <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                          <span>{{trans('dashboard.TableAdd')}} </span>
                          <!-- The file is stored here. -->
                          <input type="file" name="main_image" class="">
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
    <label>{{trans('dashboard.add')}} صور للمطعم <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>

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
                  <button type="submit" class="btn btn-primary">{{trans('dashboard.add')}}</button>
                </div>
                </div>
                <!-- /.card-body -->


                
              </form>

 
                            </div>
                        </div>

                        

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme working">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Pro by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

 

@endsection




 @section('javascript')
<!-- DataTables -->
<script src="{{asset('dist/js/bootstrap-imageupload.js')}}"></script>

<script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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



$('#addListUrl').click(function(){
  $('#addListUrl').before( "<p> <input type='text' class='form-control'   name='url[]' style='width:97%;margin-top:10px'><span class='remove_fieldurl' style='float: left;padding: 0px;display: inline;position: relative;top: -35px;width: 11px;height: 28px;font-weight: bolder;'>x</span> </p>");
});
 $(document).on('click', 'span.remove_fieldurl', function () {
                $(this).closest('p').remove();
            });





 $(document).on('change', '#basic_checkbox_1', function() {
    if(this.checked) {

      $('#showreservation').attr('hidden',false);
    }else{
            $('#showreservation').attr('hidden',true);

    }
});


  $(document).on('change', '#basic_checkbox_2', function() {
    if(this.checked) {

      $('#showdelivery').attr('hidden',false);
    }else{
            $('#showdelivery').attr('hidden',true);

    }
});

</script>


 @endsection
