


@if(App::getLocale() == 'ar')
<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> لايوجد {{$sectionِAr}}</h1>

@else 

<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> Not Found {{$sectionِEn}} </h1>

@endif