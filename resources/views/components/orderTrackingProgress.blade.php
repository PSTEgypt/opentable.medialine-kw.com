

                            <div class="order-steps">
                                <a href="shopping-cart.html" class="step-item {{$statu == 0 ?  'active': ''}}  ">
                                    <div class="step-progress">
                                        <div class="step-count">1</div>
                                    </div>
                                    <div class="step-label">{{App::getLocale() == 'ar' ? "جاهزة للشحن ":"Ready for shipping"}}</div>
                                </a>
                                <a href="checkout.html" class="step-item {{$statu == 1 ?  'active': ''}}  ">
                                    <div class="step-progress">
                                        <div class="step-count">2</div>
                                    </div>
                                    <div class="step-label">{{App::getLocale() == 'ar' ? " خارج للتوصيل":"Out for delivery"}}</div>
                                </a>
                                <a href="payment.html" class="step-item {{$statu == 2 ?  'active': ''}}  ">
                                    <div class="step-progress">
                                        <div class="step-count">3</div>
                                    </div>
                                    <div class="step-label">{{App::getLocale() == 'ar' ? "  تم التوصيل ":"Delivered"}}</div>
                                </a>
                            </div>