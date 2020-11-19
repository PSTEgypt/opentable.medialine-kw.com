
@if(Session::get('success'))
@if(App::getLocale()=='ar')
@section('javascript')
<script>
toastr.success("{{Session::get('success')['ar']}}");
</script>
@endsection

@else 

@section('javascript')
<script>
toastr.success("{{Session::get('success')['en']}}");
</script>
@endsection

@endif

@endif

@if(Session::get('error'))

@if(App::getLocale()=='ar')

@section('javascript')
<script>

toastr.error("{{Session::get('error')['ar']}}");

</script>
@endsection

@else 

@section('javascript')
<script>
toastr.error("{{Session::get('error')['en']}}");
</script>
@endsection

@endif

@endif


