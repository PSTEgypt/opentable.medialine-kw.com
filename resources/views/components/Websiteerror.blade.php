@if ($errors->any())
@foreach ($errors->all() as $error)

@if(App::getLocale() == 'ar')
@section('javascript')
<script>
toastr.error("{{ $error }}", 'خطاء !');
</script>
@endsection
@endif

@section('javascript')
@if(App::getLocale() == 'en')
<script>
toastr.error("{{ $error }}", 'error !');
</script>
@endif 
@endsection




          

      

                @endforeach
@endif

