
@extends('layoutDashboard.app',['title'=>'اضافة طاولة'])
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' اضافة طاولة '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('table.add.submit ')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">


                <div class="form-group col-md-6">
                    <label for="InputNameAr">  رقم  الطاولة  </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="table_id">
                  </div>

                    <div class="form-group col-md-6">
                    <label for="InputNameAr">  عدد الاشخاص  للطاولة      </label>
                    <input type="number" class="form-control" id="InputNameAr" placeholder="من" name="count_from">
</br>
                    <input type="number" class="form-control" id="InputNameAr"  placeholder="الي "   name="count_to">

                  </div>




                  <div class="form-group col-lg-6">
                    <label for="InputNameAr"> تصنيف الطاولة   </label>
                    <select name="type" id="type" class="form-control js-example-basic-single" >
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}  </option>
                    @endforeach
                  </select>
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