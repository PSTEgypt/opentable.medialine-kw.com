
 <div class="col-md-4">
                        <div class="cart-summary user-account">
                            <div class="user-prief">
                                <img src="{{asset('img/user-image.svg')}}" alt="" style="
    width: 45px;
">
                                <div class="user-info">
                                    <h6>{{$user->name}}</h6>
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                            <h4>{{App::getLocale() == 'ar' ? " لوحة التحكم ":"Dashboard"}}</h4>
                            <ul class="list-style-group list-unstyled">
                                <li class="list-style-item">
                                    <a href="/orders" class="active"><img src="{{asset('img/Cart-c.svg')}}" alt=""> {{App::getLocale() == 'ar' ? "الطلبات":"orders"}}  <span>{{\App\Orders::where('user_id',\Auth::guard('users')->user()->id)->count()}}</span></a>
                                </li>
                                <li class="list-style-item">
                                    <a href="/wishlist"><img src="{{asset('img/Whishlist.svg')}}" alt=""> {{App::getLocale() == 'ar' ? "المفضلة":"wishlist"}}   <span>{{\App\wishList::where('user_id',\Auth::guard('users')->user()->id)->count()}}</span></a>
                                </li>
                            </ul>
                            <h4>{{App::getLocale() == 'ar' ? "اعدادات الحساب ":"Account settings"}}</h4>
                            <ul class="list-style-group list-unstyled">
                                <li class="list-style-item">
                                    <a href="/profile"><img src="{{asset('img/User profile.svg')}}" alt="">{{App::getLocale() == 'ar' ? "معلومات الحساب":"profile info"}} </a>
                                </li>
                                <li class="list-style-item">
                                    <a href="/address"><img src="{{asset('img/Location.svg')}}" alt=""> {{App::getLocale() == 'ar' ? "العناوين":"addresses"}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>