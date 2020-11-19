<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\food_order;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| ordersController
|--------------------------------------------------------------------------
| this will handle all orders part (R)
|
*/
/**
 *                    _
 *                   | |
 *       ___  _ __ __| | ___ _ __ ___
 *      / _ \| '__/ _` |/ _ \ '__/ __|
 *     | (_) | | | (_| |  __/ |  \__ \
 *      \___/|_|  \__,_|\___|_|  |___/
 *
 *
 */
class ordersController extends Controller
{
/**
* show list of category
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $orders=order::with('user')->with('orderProduct')->get();
    return view('Admin.pages.order.list',compact('orders'));
    }

    public function accepted(){
        $orders=order::with('user')->with('orderProduct')->get();
        return view('Admin.pages.order.accepted',compact('orders'));
        }


        public function delivery(){
            $orders=order::with('user')->with('orderProduct')->get();
            return view('Admin.pages.order.delivery',compact('orders'));
            }

            public function cancelOrder(){
                $orders=order::with('user')->with('orderProduct')->get();
                return view('Admin.pages.order.cancel',compact('orders'));
                }
    /**
    * show info of  order By id
    * @pararm int $id order id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $order=order::where('id',$id)->with('user')->with('orderFood')->with('orderProduct')->first();
        return view('Admin.pages.order.info',compact('order'));
    }

    public function accept($id){
        $order=order::where('id',$id)->first();
        $order->status="inprogress";
        $order->is_accept=1;
        $order->save();
        \Notify::success('تم قبول الطلب     بنجاح', ' تم قبول    الطلب    ');

        return redirect()->back();
    }



    public function delivered($id){
        $order=order::where('id',$id)->first();
        $order->status="delivered";
        $order->save();
        \Notify::success('تم توصيل  الطلب     بنجاح', ' تم توصيل     الطلب    ');

        return redirect()->back();
    }

    public function cancel($id){
        $order=order::where('id',$id)->first();
        $order->status="cancel";
        $order->is_cancel=1;
        $order->save();
        \Notify::success('تم الغاء الطلب     بنجاح', ' تم الغاء    الطلب    ');

        return redirect()->back();
    }


    

}
