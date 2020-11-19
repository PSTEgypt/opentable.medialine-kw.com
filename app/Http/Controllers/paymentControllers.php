<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurant_payment;
use Carbon\Carbon;
use App\restaurant;
use App\Notifications;

/*
|--------------------------------------------------------------------------
| restaurant_paymentControllers
|--------------------------------------------------------------------------
| this will handle all balance part (CRUD) 
|
*/
/***
 *      _           _                      
 *     | |         | |                     
 *     | |__   __ _| | __ _ _ __   ___ ___ 
 *     | '_ \ / _` | |/ _` | '_ \ / __/ _ \
 *     | |_) | (_| | | (_| | | | | (_|  __/
 *     |_.__/ \__,_|_|\__,_|_| |_|\___\___|
 *                                         
 *                                         
 */
class paymentControllers extends Controller
{
/**  
* show list of balance Recharging
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list()
{
     $restaurant_payment=

     restaurant_payment::with(['restaurant'=>function($q){
        $q->withTrashed()->get();
    }])->where('is_pay',1)->get();



    return view('Admin.pages.payment.list',compact('restaurant_payment'));
    }


    /**  
* show list of balance Recharging
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function unSubscription(){

     $notSubrestaurant_payment=restaurant::doesntHave('payment')->get();

    return view('Admin.pages.payment.unSubscription',compact('notSubrestaurant_payment'));
    }



    /**  
* show list of balance Recharging
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function ended()
    {

     $restaurant_payment=restaurant_payment::with(['restaurant'=>function($q){
        $q->withTrashed()->get();
    }])->where('is_pay',0)->get();

    return view('Admin.pages.payment.ended',compact('restaurant_payment'));
    }
    /**  
    * show info of  balance Recharging By id
    * @pararm int $id balance Recharging id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $restaurant_payment=restaurant_payment::where('id',$id)->with('user')->with('provider')->first();
        return view('pages.payment.info',compact('restaurant_payment'));
    }
     /**  
    * show  form add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd()
    {
        
        $restaurants= restaurant::get();
        return view('Admin.pages.payment.add',compact('restaurants'));
    }    

    /**  
    * save add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request)
    {

    $rules=[
        'price'=>'required',
        'from'=>'required|date',
        'to'=>'required|date',
        'restaurantId'=>'required'
    ];

  
  
             

$request->validate($rules);

        $payment=new restaurant_payment;
    
        $payment->price=$request->price;
        $payment->from=$request->from;
        $payment->to=$request->to;
        $payment->restaurant_id=$request->restaurantId;
        $payment->is_pay=$request->is_pay == NULL ?  '0' : '1';
        $payment->save();

       
        \Notify::success('تم اضافة مطعم   جديد بنجاح', ' اضافة  مطعم     ');
        return redirect()->back();
    }  




    /**  
    * save add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function pay(Request $request,$id){

  

        $payment=restaurant_payment::where('id',$id)->first();
    
        $payment->is_pay=1;

        $payment->save();

       
        \Notify::success('تم اضافة مطعم   جديد بنجاح', ' اضافة  مطعم     ');
        return redirect()->back();  
    } 


/**  
* restaurant_payment By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function delete($id){
    $restaurant=restaurant_payment::where('id',$id)->delete();
    \Notify::success('تم حذف  الاستراك بنجاح    بنجاح', ' تم الحذف بنجاح    ');
    return redirect()->back();
}
}
