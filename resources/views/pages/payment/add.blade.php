
@extends('layoutDashboard.app',['title'=>'الاشتراكات '])
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' اضافة اشتراك '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('payment.add.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">


                <div class="form-group col-lg-6">
                    <label for="InputNameAr">  تاريخ البداء</label>
                    <input type="date" class="form-control" id="InputNameAr"  name="from">
                  </div>

                  <div class="form-group col-lg-6">
                    <label for="InputNameAr">  تاريخ الانتهاء</label>
                    <input type="date" class="form-control" id="InputNameAr"  name="to">
                  </div>

                    <div class="form-group col-lg-6">
                    <label for="InputNameAr">  سعر الاشتراك</label>
                    <input type="number" class="form-control" id="InputNameAr"  name="price">
                  </div>

                
                    <div class="form-group col-lg-6">
                    <input type="checkbox" class="" id="InputNameAr" value='1'  name="is_pay">
                    <label for="InputNameAr">  تم الدفع  </label>

                  </div>

                  <div class="form-group col-lg-6">
                    <label for="InputNameAr"> المطاعم  </label>
                    <select name="restaurantId" id="category" class="form-control js-example-basic-single" >
                    @foreach($restaurants as $restaurant )
                    <option value="{{$restaurant->id}}">{{$restaurant->name}} </option>
                    @endforeach



                  </select>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();

});
</script>
 @endsection