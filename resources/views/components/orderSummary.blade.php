<div class="cart-summary">
                            <h4>{{App::getLocale() == 'ar' ? 'ملخص الطلب ' : 'order summary'}}</h4>
                            <div class="total-summary">
                                <p>{{App::getLocale() == 'ar' ? "سعر الطلب  ": "subtotal"}}: <span>EGP{{$subtotal}}</span></p>
                                <p>{{App::getLocale() == 'ar' ? " الشحن  ": "shipping"}}: <span id='Shipping'>EGP {{$shipping}}</span></p>
                                <p>{{App::getLocale() == 'ar' ? " الخصم": "discount"}}: <span>EGP {{$discount}}</span></p><hr>
                                <p class="total">{{App::getLocale() == 'ar' ? " السعر الكلي ": "total"}}<span id='TotalPrice' data-total="{{$total}}">EGP {{$total}}</span></p>
                                <!-- <a href="checkout.html" class="btn btn-block btn-summary">Proceed to checkout</a> -->
                            </div>
                            
                            @if($discount == 0 )
                            <div class="coupon">
                                <div class="acco-header">
                                    <h4>{{App::getLocale() == 'ar' ? " الخصم ": "Purchase Coupon"}}</h4>
                                </div>
                                <div class="acco-body">
                           <form action="/add/coupon/" method="get">
                                    <input type="text" id="coupon" name="coupon">
                                    <button type="submit"  class="btn btn-block btn-summary">{{App::getLocale() == 'ar' ? " اضافة كود الخصم  ": "Apply Coupon"}}</button>
                                </div>
                            </div>
                        @endif
                        </div>

