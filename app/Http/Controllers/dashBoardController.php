<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Ads;
use App\Codes;
use App\Orders;
use App\product;
use Charts;
/*
|--------------------------------------------------------------------------
| dashBoardController
|--------------------------------------------------------------------------
| this will handle all dashBoardController part (CRUD)
|
*/
/**
     _           _     ____                      _
    | |         | |   |  _ \                    | |
  __| | __ _ ___| |__ | |_) | ___   __ _ _ __ __| |
 / _` |/ _` / __| '_ \|  _ < / _ \ / _` | '__/ _` |
| (_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |
 \__,_|\__,_|___/_| |_|____/ \___/ \__,_|_|  \__,_|

 */
class dashBoardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=Users::get();
        $products=product::get();
        $ads=Ads::get();
        $orders=Orders::get();
        $userChart = Charts::database($users, 'line', 'highcharts')
			      ->title("التسجيل الشهر للمستخدميين")
			      ->elementLabel("اجمالي المستخدميين ")
			      ->dimensions(1000, 500)
			      ->responsive(true)
                  ->groupByMonth(date('Y'), true);

          $ordersChart = Charts::database($orders, 'line', 'highcharts')
			      ->title("التسجيل الشهر للطلبات   ")
			      ->elementLabel("اجمالي الطلبات ")
			      ->dimensions(1000, 500)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);

		$lastUser=Users::orderBy('created_at', 'desc')->take(10)->get();
		$lastOrder=orders::with('user')->orderBy('created_at', 'desc')->take(10)->get();

        return view('welcome',compact('ordersChart','userChart','users','products','ads','orders','lastUser','lastOrder'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $rules=[
            'start_at'=>'date',
            'end_at'=>'date',
        ];
        $message=[
        'start_at.date'=>'يجب ان يكون تاريخ  ',
        'end_at.date'=>'يجب ان يكون تاريخ  ',];
        $request->validate($rules,$message);


        #get User data
        $users=Users::where('created_at','<=',$request->start_at)
        ->where('created_at','>=',$request->end_at)
        ->get();

        #get Provider data
        $providers=Providers::where('created_at','<=',$request->start_at)
        ->where('created_at','>=',$request->end_at)
        ->get();

        #get order data
        $orders=Orders::where('created_at','<=',$request->start_at)
        ->where('created_at','>=',$request->end_at)
        ->get();

                #get User data
        $user=Users::count();

        #get Provider data
        $provider=Providers::count();

        #get order data
        $order=Orders::count();

        return view('pages.report.list',compact('users','providers','orders','user','provider','order'));
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function report()
    {



        #get User data
        $user=Users::count();

        #get Provider data
        $provider=Providers::count();

        #get order data
        $order=Orders::count();


        return view('pages.report.list',compact('user','provider','order'));
    }
}
