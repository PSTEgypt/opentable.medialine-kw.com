<span>
@if($rate !== 0)
@for($i= 1; $i <= $rate ; $i++)

    <i class="fas fa-star"></i>
@endfor
@endif

@if($rate < 5 && $rate !== 0 )
@for($i= 1; $i <= $rate-5 ; $i++)

    <i class="far fa-star"></i>
@endfor
@endif

@if($rate == 0)
@for($i= 1; $i <= 5 ; $i++)

    <i class="far fa-star"></i>
@endfor
@endif

</span>