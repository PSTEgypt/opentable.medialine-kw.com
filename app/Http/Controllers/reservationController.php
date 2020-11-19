<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservation;
use App\Users;
class reservationController extends Controller
{
    public function list(Request $request){
        $newreservation=reservation::where('is_cancel_by_user',0)->where('is_cancel_by_restaurant',0)->where('is_accept',0)->get();
        $acceptReservation=reservation::where('is_accept',1)->get();
        $cancelByuser=reservation::where('is_cancel_by_user',1)->get();
        $cancelByreservation=reservation::where('is_cancel_by_restaurant',1)->get();
        
        return view('Admin.pages.reservation.list',compact('newreservation','acceptReservation','cancelByuser','cancelByreservation'));



    }



    public function accepted(Request $request){
        $newreservation=reservation::where('is_cancel_by_user',0)->where('is_cancel_by_restaurant',0)->where('is_accept',0)->get();
        $acceptReservation=reservation::where('is_accept',1)->get();
        $cancelByuser=reservation::where('is_cancel_by_user',1)->get();
        $cancelByreservation=reservation::where('is_cancel_by_restaurant',1)->get();
        
        return view('Admin.pages.reservation.accepted',compact('newreservation','acceptReservation','cancelByuser','cancelByreservation'));



    }




    public function cancelByrestaurant(Request $request){
        $newreservation=reservation::where('is_cancel_by_user',0)->where('is_cancel_by_restaurant',0)->where('is_accept',0)->get();
        $acceptReservation=reservation::where('is_accept',1)->get();
        $cancelByuser=reservation::where('is_cancel_by_user',1)->get();
        $cancelByreservation=reservation::where('is_cancel_by_restaurant',1)->get();
        
        return view('Admin.pages.reservation.cancelByrest',compact('newreservation','acceptReservation','cancelByuser','cancelByreservation'));



    }



    public function cancelByuser(Request $request){
        $newreservation=reservation::where('is_cancel_by_user',0)->where('is_cancel_by_restaurant',0)->where('is_accept',0)->get();
        $acceptReservation=reservation::where('is_accept',1)->get();
        $cancelByuser=reservation::where('is_cancel_by_user',1)->get();
        $cancelByreservation=reservation::where('is_cancel_by_restaurant',1)->get();
        
        return view('Admin.pages.reservation.cancelByUser',compact('newreservation','acceptReservation','cancelByuser','cancelByreservation'));



    }


    

    public function accept($id){
        $ad=reservation::where('id',$id)->first();

            $ad->is_accept = 1;
            $ad->save();
            \Notify::success('تم تاكيد   الحجز     بنجاح', 'تغير حالة  الحجز     ');
        
    
        return redirect()->back();
    }




    public function cancel($id){
        $ad=reservation::where('id',$id)->first();

            $ad->is_cancel_by_restaurant = 1;
            $ad->save();
            \Notify::success('تم تاكيد   الغاء الحجز      بنجاح', 'تغير حالة  الحجز     ');
        
    
        return redirect()->back();
    }
public function Userinfo($id){
    $user=Users::where('id',$id)->first();
    return view('Admin.pages.reservation.Userinfo',compact('user'));
}
}
