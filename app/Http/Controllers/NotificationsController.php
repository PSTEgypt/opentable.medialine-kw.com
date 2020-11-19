<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| NotificationsController
|--------------------------------------------------------------------------
| this will handle all Notifications part (CRUD) 
|
*/
/***
 *      _   _       _   _  __ _           _   _                 
 *     | \ | |     | | (_)/ _(_)         | | (_)                
 *     |  \| | ___ | |_ _| |_ _  ___ __ _| |_ _  ___  _ __  ___ 
 *     | . ` |/ _ \| __| |  _| |/ __/ _` | __| |/ _ \| '_ \/ __|
 *     | |\  | (_) | |_| | | | | (_| (_| | |_| | (_) | | | \__ \
 *     |_| \_|\___/ \__|_|_| |_|\___\__,_|\__|_|\___/|_| |_|___/
 *                                                              
 *                                                              
 */
class NotificationsController extends Controller
{
/**  
* show list of Notifications
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $Notifications=Notifications::get();
    return view('pages.Notifications.list',compact('Notifications'));
    }
    /**  
    * show info of  Notification By id
    * @pararm int $id Notification id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $Notification=Notifications::where('id',$id)->first();
        return view('pages.Notifications.info',compact('Notification'));
    }
   
    /**  
    * show  form edit  of  Notification By id 
    * @pararm int $id Notification id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $Notification=Notifications::where('id',$id)->first();
        return view('pages.Notifications.edit',compact('Notification'));
    }    

    /**  
    * save edit  of  Notification By id 
    * @pararm int $id Notification id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

            $rules=[
            'content_ar'=>'required',
            'content_en'=>'required',
        ];
        $message=[
            'content_ar.required'=>'يجب ادخال الاشعار  بالعربي',
            'content_en.required'=>'يجب ادخال الاشعار بالانجليزي '
            ];

        $request->validate($rules,$message);

        $Notification=Notifications::where('id',$id)->first();
        $Notification->content_ar=$request->content_ar;
        $Notification->content_en=$request->content_en;
        $Notification->save();

        \Notify::success('تم تعديل بيانات  الاشعار بنجاح', ' تعديل بيانات  الاشعار   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  Notification 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.Notifications.add');
    }    

    /**  
    * save add  of  Notification 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
        $rules=[
            'content_ar'=>'required',
            'content_en'=>'required',
        ];
        $message=[
            'content_ar.required'=>'يجب ادخال الاشعار  بالعربي',
            'content_en.required'=>'يجب ادخال الاشعار بالانجليزي '
            ];
        $request->validate($rules,$message);


        $Notification=new Notifications;
        $Notification->content_ar=$request->content_ar;
        $Notification->content_en=$request->content_en;
        $Notification->save();
        \Notify::success('تم اضافة  الاشعار جديد بنجاح', ' اضافة   الاشعار   ');

        return redirect()->back();
    }  
}
