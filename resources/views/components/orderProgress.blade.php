<div class="order-steps">

    <a href="#" class="step-item {{$statu == 0 ?  'current': ''}}   {{$statu >= 0 ?  'active': ''}}      ">
        <div class="step-progress">
            <div class="step-count">1</div>
        </div>
        <div class="step-label">{{App::getLocale() == 'ar' ? "سلة التسوق":"Cart"}}</div>
    </a>

    <a href="#" class="step-item  {{$statu == 1 ?  'current': ''}}   {{$statu >= 1 ?  'active': ''}} ">
        <div class="step-progress">
            <div class="step-count">2</div>
        </div>
        <div class="step-label">{{App::getLocale() == 'ar' ? "الشحن":"Shipping"}}</div>
    </a>

    <a href="#" class="step-item {{$statu == 2 ?  'current': ''}}   {{$statu >= 2 ?  'active': ''}}">

        <div class="step-progress">
            <div class="step-count">3</div>
        </div>  
        <div class="step-label">{{App::getLocale() == 'ar' ? "الدفع":"Payment"}}</div>
    </a>
    <a href="#" class="step-item {{$statu == 3 ?  'current active': ''}}    ">
        <div class="step-progress">
            <div class="step-count">4</div>
        </div>
        <div class="step-label">{{App::getLocale() == 'ar' ? "متابعة الطلب ":"Tracking"}}</div>
    </a>
    
</div>