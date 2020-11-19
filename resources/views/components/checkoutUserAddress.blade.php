
    @foreach($Alladdress as $address)
    <div class="content-bar">
        <div class="head-bar">
        <a  style="
    display: inline-block;
    color: #f86eac;
" role="button" data-toggle="collapse" href="#Address-{{$address->id}}"
             aria-expanded="false" aria-controls="Address-{{$address->id}}" >
        <h5>{{$address->address_name}} <i class="fa fa-angle-down"></i>  



        
        </h5>
        </a>   
        <span style="float:right;"><input type="radio"  class="ShippingCity"  data-cityId="{{ $address->city->id }}"  form="Address"  name="address" value="{{$address->id}}" {{ $cart->address_id == $address->id  ? "checked" :'' }} ></span>
        </div>
        <div class="collapse" id="Address-{{$address->id}}">
        <div class="well">
            <form action="/address/update/{{$address->id}}" method="post">
            @csrf
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"}}</label>
                        <input type="text" class="form-control" id="address_name" name="address_name" value="{{$address->address_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"}}</label>
                        <input type="text" class="form-control" id="fname" name="first_name" value="{{$address->first_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">{{App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"}}</label>
                        <input type="text" class="form-control" id="lname" name="last_name" value="{{$address->last_name}}" >
                    </div>


                    <div class="form-group col-md-6">
                    <label for="country">  {{App::getLocale() == 'ar' ? "الدولة ":"Country"}} </label>
                    <select style="/* padding-right: 0px; *//* padding-bottom: 0px; */padding-top: 00px;" class="form-control countryAddress" id="country-{{$address->id}}" data-address="{{$address->id}}" name="country" data-countryaddress="{{$address->id}}">
                        
                    @foreach($Countries as $country)
                    @if($country->id == $address->country->id)

                    <option value="{{ $address->country->id }}" selected > {{App::getLocale() == 'ar' ? $address->country->name_ar :$address->country->name_en}} </option>
                    @else 
                    <option value="{{ $country->id }}"  > {{App::getLocale() == 'ar' ? $country->name_ar :$country->name_en}} </option>
                    @endif
                    @endforeach

                  </select>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="city"> {{App::getLocale() == 'ar' ? "المدينة ":"City"}} </label>
                    <select  style="/* padding-right: 0px; *//* padding-bottom: 0px; */padding-top: 00px;" class="form-control cityAddress" id="city-{{$address->id}}" name="city" >
                   
                    @foreach($cities as $city) 
                    @if($city->id ==$address->city->id )
                    <option  data-country="{{$address->country->id }}" value="{{ $address->city->id }}" selected  > {{App::getLocale() == 'ar' ? $address->city->name_ar :$address->city->name_en}} </option>
                    @else  

                    <option  data-country="{{$city->country->isEmpty()  ? 0: $city->country[0]->id  }}" style="{{!$city->country->isEmpty() && $city->country[0]->id == $address->country->id   ?  : 'display: none;' }}"  value="{{ $city->id }}"   > {{App::getLocale() == 'ar' ? $city->name_ar :$city->name_en}} </option>
                    @endif
                    @endforeach

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street">{{App::getLocale() == 'ar' ? "اسم الشارع":"Street Name/No"}}</label>
                        <input type="text" class="form-control" id="street" name="street_name" value="{{$address->street_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building">{{App::getLocale() == 'ar' ? "اسم المبني":"Building Name/No"}}</label>
                        <input type="text" class="form-control" id="building" name="building_name" value="{{$address->building_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor">{{App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"}}</label>
                        <input type="number" class="form-control" id="floor" name="floor" value="{{$address->floor}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment">{{App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"}}</label>
                        <input type="number" class="form-control" id="apartment" name="apartment" value="{{$address->apartment}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark">{{App::getLocale() == 'ar' ? " أقرب معلم":"Nearest Landmark"}}</label>
                        <input type="text" class="form-control" id="landmark" name="nearest" value="{{$address->nearest}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">{{App::getLocale() == 'ar' ? " اسم الموقع ":"Location Name "}}</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{$address->location}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"}}</label>
                        <input type="tel" class="form-control" id="phone" name="phone_number" value="{{$address->phone_number}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone">{{App::getLocale() == 'ar' ? "رقم الهاتف اضافي (اختياري) ":"Additional Phone Number (Optional)"}}</label>
                        <input type="tel" class="form-control" id="add-phone" name="additional_phone_number" value="{{$address->additional_phone_number}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline">{{App::getLocale() == 'ar' ? " رقم ارضي ":"LandLine"}}</label>
                        <input type="text" class="form-control" id="landline" name="landLine" value="{{$address->landLine}}">
                    </div>
                    <div class="form-group col-12">
                        <label for="note">{{App::getLocale() == 'ar' ? "ملاحظة الشحن":"Shipping Note"}}</label>
                        <textarea class="form-control" id="note" rows="8" name="shipping_note" >{{$address->shipping_note}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn save">{{App::getLocale() == 'ar' ? "حفظ":"Save"}}</button>
                        <button  type="reset" value="Reset" class="btn cancel">{{App::getLocale() == 'ar' ? "إلغاء":"Cancel"}}</button>
                    </div>
                </div>
            </form>
       
        </div>
        </div>

    </div>
    <hr>




    @endforeach





