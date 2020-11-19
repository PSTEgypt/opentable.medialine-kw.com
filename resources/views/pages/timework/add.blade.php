
@extends('layoutDashboard.app',['title'=>'اضافة مواعيد العمل '])
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' اضافة مواعيد العمل  '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('timework.add.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">


                <div class="form-group col-md-6">
                    <label for="InputNameAr"> اليوم   </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="day">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameAr">  موعد بداء وانتهاء العمل      </label>
                    <input type="time" class="form-control" id="InputNameAr" placeholder="من" name="work_from">
</br>
                    <input type="time" class="form-control" id="InputNameAr"  placeholder="الي "   name="work_to">

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