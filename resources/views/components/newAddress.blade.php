
   <div class="addresses">

    <div class="content-bar">
        <div class="head-bar">

        </div>
        <div class="collapse" id="Address-add">
        <div class="well">
            <form action="/address/add" method="post">
            @csrf
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"}}</label>
                        <input type="text" class="form-control " id="address_name" name="address_name" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? " الاسم الأول ":"First Name"}}</label>
                        <input type="text" class="form-control" id="fname" name="first_name" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">{{App::getLocale() == 'ar' ? " الاسم الأخير   ":"Last Name"}}</label>
                        <input type="text" class="form-control" id="lname" name="last_name" value="" >
                    </div>


                    <div class="form-group col-md-6">
                    <label for="country">  {{App::getLocale() == 'ar' ? "البلد ":"Country"}} </label>
                    <select    class="form-control countryAddress" data-address="0" id="country" name="country">
                        
                        @foreach($Countries as $country)
    
                        <option value="{{ $country->id }}"  > {{App::getLocale() == 'ar' ? $country->name_ar :$country->name_en}} </option>
                 
                        @endforeach

                  </select>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="city"> {{App::getLocale() == 'ar' ? "المحافظة ":"City"}} </label>
                    <select   class="form-control cityAddress" id="city-0" name="city">
                    @foreach($cities as $city) 

                    <option  data-country="{{$city->country->isEmpty()  ? 0: $city->country[0]->id  }}" style="{{$city->country->isEmpty()    ?  'display: none;' : '' }}"  value="{{ $city->id }}"   > {{App::getLocale() == 'ar' ? $city->name_ar :$city->name_en}} </option>

                 
                    @endforeach

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street">{{App::getLocale() == 'ar' ? " عنوان الشارع":"Street Name/No"}}</label>
                        <input type="text" class="form-control" id="street" name="street_name" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building">{{App::getLocale() == 'ar' ? " رقم/اسم العمارة ":"Building Name/No"}}</label>
                        <input type="text" class="form-control" id="building" name="building_name" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor">{{App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"}}</label>
                        <input type="number" class="form-control" id="floor" name="floor" value="0">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment">{{App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"}}</label>
                        <input type="number" class="form-control" id="apartment" name="apartment" value="0">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark">{{App::getLocale() == 'ar' ? "  أقرب علامة مميزة 
":"Nearest Landmark"}}</label>
                        <input type="text" class="form-control" id="landmark" name="nearest" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">{{App::getLocale() == 'ar' ? "  نوع الموقع 
 ":"Location Name "}}</label>
                        <input type="text" class="form-control" id="location" name="location" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"}}</label>
                        <input type="tel" class="form-control" id="phone" name="phone_number" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone">{{App::getLocale() == 'ar' ? "رقم الهاتف المحمول
   ":"Additional Phone Number (Optional)"}}</label>
                        <input type="tel" class="form-control" id="add-phone" name="additional_phone_number" value="additional_phone_number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline">{{App::getLocale() == 'ar' ? "  (اختياري) رقم هاتف أخر ":"LandLine"}}</label>
                        <input type="text" class="form-control" id="landline" name="landLine" value="0">
                    </div>
                    <div class="form-group col-12">
                        <label for="note">{{App::getLocale() == 'ar' ? "ملاحظة اللشحن":"Shipping Note"}}</label>
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
    </div>


    