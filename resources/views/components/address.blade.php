
    <div class="content-bar">
        <div class="head-bar">
        <a  role="button" data-toggle="collapse" href="#Address-add"
             aria-expanded="false" aria-controls="Address-add">
        <h5>{{App::getLocale() == 'ar' ?  "اضافة عنوان جديد  " : "add new address"}}<i class="fa fa-angle-down"></i>
        </h5>
        </a>
        </div>
        <div class="collapse" id="Address-add">
        <div class="well">
            <form action="/address/add" method="post">
            @csrf
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"}}</label>
                        <input type="text" class="form-control" id="address_name" name="address_name" value="address_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"}}</label>
                        <input type="text" class="form-control" id="fname" name="first_name" value="$address->first_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">{{App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"}}</label>
                        <input type="text" class="form-control" id="lname" name="last_name" value="last_name" >
                    </div>


                    <div class="form-group col-md-6">
                    <label for="country">  {{App::getLocale() == 'ar' ? "الدولة ":"Country"}} </label>
                    <select class="form-control" id="country_add" name="country">
                        
                    <option value="{{ $address->country->id }}" selected > {{App::getLocale() == 'ar' ? $address->country->name_ar :$address->country->name_en}} </option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}"  > {{App::getLocale() == 'ar' ? $country->name_ar :$country->name_en}} </option>
                    @endforeach

                  </select>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="city"> {{App::getLocale() == 'ar' ? "المدينة ":"City"}} </label>
                    <select class="form-control" id="city_add" name="city">
                    <option  data-country="{{$city->country->id }} value="{{ $address->city->id }}" selected > {{App::getLocale() == 'ar' ? $address->city->name_ar :$address->city->name_en}} </option>
                    @foreach($cities as $city) 
                    <option  data-country="{{$city->country->id }}" value="{{ $city->id }}"  > {{App::getLocale() == 'ar' ? $city->name_ar :$city->name_en}} </option>
                    @endforeach

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street">{{App::getLocale() == 'ar' ? "اسم الشارع":"Street Name/No"}}</label>
                        <input type="text" class="form-control" id="street" name="street_name" value="street_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building">{{App::getLocale() == 'ar' ? "اسم المبني":"Building Name/No"}}</label>
                        <input type="text" class="form-control" id="building" name="building_name" value="building_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor">{{App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"}}</label>
                        <input type="number" class="form-control" id="floor" name="floor" value="floor">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment">{{App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"}}</label>
                        <input type="number" class="form-control" id="apartment" name="apartment" value="apartment">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark">{{App::getLocale() == 'ar' ? " أقرب معلم":"Nearest Landmark"}}</label>
                        <input type="text" class="form-control" id="landmark" name="nearest" value="nearest">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">{{App::getLocale() == 'ar' ? " اسم الموقع ":"Location Name "}}</label>
                        <input type="text" class="form-control" id="location" name="location" value="location">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"}}</label>
                        <input type="tel" class="form-control" id="phone" name="phone_number" value="phone_number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone">{{App::getLocale() == 'ar' ? "رقم الهاتف اضافي (اختياري) ":"Additional Phone Number (Optional)"}}</label>
                        <input type="tel" class="form-control" id="add-phone" name="additional_phone_number" value="additional_phone_number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline">{{App::getLocale() == 'ar' ? " رقم ارضي ":"LandLine"}}</label>
                        <input type="text" class="form-control" id="landline" name="landLine" value="landLine">
                    </div>
                    <div class="form-group col-12">
                        <label for="note">{{App::getLocale() == 'ar' ? "ملاحظة الشحن":"Shipping Note"}}</label>
                        <textarea class="form-control" id="note" rows="8" name="shipping_note" value="shipping_note"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn save">{{App::getLocale() == 'ar' ? "حفظ":"Save"}}</button>
                        <button class="btn cancel">{{App::getLocale() == 'ar' ? "إلغاء":"Cancel"}}</button>
                    </div>
                </div>
            </form>
       
        </div>
        </div>

    </div>

