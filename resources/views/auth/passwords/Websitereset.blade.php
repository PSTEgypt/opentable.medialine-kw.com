@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="login-form">
            <form action="/updatePassword/submit" method="post">
            @csrf

            <div class="form-group">
                    <label for="email">{{App::getLocale() == 'ar' ? "الايميل ": "email"}}</label>
                    <input type="hidden" name="token" value="{{$token}}">
                    <input type="email" class="form-control" id="email"  name="email" placeholder="{{App::getLocale() == 'ar' ? 'الايميل ': 'email'}}">
                </div>
                <div class="form-group">
                    <label for="password">{{App::getLocale() == 'ar' ? "الباسورد": "Password"}}</label>
                    <input type="password" class="form-control" id="password"  name="password" placeholder="{{App::getLocale() == 'ar' ? 'الباسورد': 'Password'}}">
                </div>


                <div class="form-group">
                    <label for="password">{{App::getLocale() == 'ar' ? "تاكيد الباسورد": "password confirmation "}}</label>
                    <input type="password" class="form-control" id="password"  name="password_confirmation" placeholder="{{App::getLocale() == 'ar' ? 'تاكيد الباسورد': 'password_confirmation'}}">
                </div>


                <button type="submit" class="btn btn-block ">{{App::getLocale() == 'ar' ? "ارسال  ": "send"}}</button>
            </form>
        </div>
    </div>



@endsection

