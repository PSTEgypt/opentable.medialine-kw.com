
@extends('layoutDashboard.app',['title'=>'اضافة وجبة'])
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' اضافة وجبة '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('food.add.submfood ')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">


                <div class="form-group col-md-6">
                    <label for="InputNameAr">  اسم الوجبة  </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameAr">  سعر الوجبة    </label>
                    <input type="number" class="form-control" id="InputNameAr"  name="price">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="InputNameEn">   وصف الوجبة  </label>
                    <textarea id="some-textarea1" class="form-control"   name="description" placeholder=" وصف المطعم" ></textarea>

                  </div>

                  <div class="form-group col-lg-6">
                    <label for="InputNameAr"> تصنيف الوجبة   </label>
                    <select name="restaurantId" id="category" class="form-control js-example-basic-single" >
                    @foreach($foods as $food )
                    <option value="{{$food->id}}">{{$food->name}} </option>
                    @endforeach



                  </select>
                  </div>
                </div>
                  <div class="form-group">

                    <label for="InputFile"> صوره  الوجبة </label>
                    <div class="imageupload panel panel-default">
                  <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                          <span>{{trans('dashboard.TableAdd')}} </span>
                          <!-- The file is stored here. -->
                          <input type="file" name="image">
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


 @section('javascript')
<!-- DataTables -->
<script src="{{asset('dist/js/bootstrap-imageupload.js')}}"></script>
<!-- page script -->
<script>
$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});
</script>

 @endsection