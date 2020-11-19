<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appSetting;
use App\appPhone;
use App\appEmail;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| appSettingController
|--------------------------------------------------------------------------
| this will handle all appSetting part (CRUD) 
|
*/

/***
 *                        _____      _   _   _             
 *                       / ____|    | | | | (_)            
 *       __ _ _ __  _ __| (___   ___| |_| |_ _ _ __   __ _ 
 *      / _` | '_ \| '_ \\___ \ / _ \ __| __| | '_ \ / _` |
 *     | (_| | |_) | |_) |___) |  __/ |_| |_| | | | | (_| |
 *      \__,_| .__/| .__/_____/ \___|\__|\__|_|_| |_|\__, |
 *           | |   | |                                __/ |
 *           |_|   |_|                               |___/ 
 */

class appSettingController extends Controller
{
    /**  
    * show  form edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit(){
        $appSetting=appSetting::where('id',1)->first();
        $appPhones=appPhone::get();
        $appEmails=appEmail::get();
        
        return view('pages.appSetting.edit',compact('appSetting','appPhones','appEmails'));
    }    

    /**  
    * save edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request){

            $rules=[
            'about_us_ar'=>'required',
            'about_us_en'    =>'required',
            'policy_term_ar' =>'required',
            'policy_term_en'=>'required',
        ];
        $message=[
            'about_us_ar.required'=>'يجب ادخال عن التطبيق  بالعربي',
            'about_us_en.required'=>'يجب ادخال عن التطبيق بالانجليزي ',
            'policy_term_ar.required'=>'يجب ادخال سياسة الاستخدام  بالعربي',
            'policy_term_en.required'=>'يجب ادخال سياسة الاستخدام بالانجليزي '
            ];

        $request->validate($rules,$message);

        $Notification=appSetting::where('id',1)->first();
        $Notification->about_us_ar=$request->about_us_ar;
        $Notification->about_us_en=$request->about_us_en;
        $Notification->policy_term_ar=$request->policy_term_ar;
        $Notification->policy_term_en=$request->policy_term_en;
        $Notification->point_for_new_order=$request->point_for_new_order;
        $Notification->point_for_rating=$request->point_for_rating;
        $Notification->minimum_to_accept_order=$request->minimum_to_accept_order;
        $Notification->fees=$request->fees;
        $Notification->save();

        \Notify::success('تم تعديل الاعدادات   بنجاح', ' تعديل الاعدادات ');
        return redirect()->back();
    }  






  /**  
    * save edit  of  appPhone By id 
    * @pararm int $id appPhone id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEditPhone($id){
        $appPhone=appPhone::where('id',$id)->first();
        return view('pages.phone.edit',compact('appPhone'));
    }    

    /**  
    * save edit  of  appPhone By id 
    * @pararm int $id appPhone id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEditPhone(Request $request,$id){

            $rules=[
            'phone'=>'required|unique:app_phones,phone,'.$id,

        ];
        
        $message=['phone.required'=>'يجب ادخال رقم الهاتف ','phone.unique'=>'يجب ادخال  رقم غير موجود :input ',];
        $request->validate($rules,$message);
        
        $appPhone=appPhone::where('id',$id)->first();
        $appPhone->phone=$request->phone;
        $appPhone->created_at=Carbon::now();
        $appPhone->save();

        \Notify::success('تم تعديل بيانات الهاتف   بنجاح', ' تعديل بيانات  الهاتف    ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  phone 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAddPhone(){
        return view('pages.phone.add');
    }    

    /**  
    * save add  of  phone 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAddPhone(Request $request){
            $rules=[
            'phone'=>'required|unique:app_phones,phone',

        ];
        
        $message=['phone.required'=>'يجب ادخال رقم الهاتف ','phone.unique'=>'يجب ادخال  رقم غير موجود :input ',];
        $request->validate($rules,$message);


        $appPhone=new appPhone;
        $appPhone->phone=$request->phone;
        $appPhone->created_at=Carbon::now();
        $appPhone->save();
        
        \Notify::success('تم اضافة  هاتف جديد بنجاح', ' اضافة   هاتف    ');

        return redirect()->back();
    }  
    
    
    /**  
    * save add  of  phone 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function deletePhone(Request $request,$id){


        $appPhone=appPhone::where('id',$id)->delete();
        
        \Notify::success('تم حذف  هاتف  بنجاح', ' تم حذف    هاتف    ');

        return redirect()->back();
    }  



  /**  
    * save edit  of  email By id 
    * @pararm int $id appPhone id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEditEmail($id){
        $appEmail=appEmail::where('id',$id)->first();
        return view('pages.email.edit',compact('appEmail'));
    }    

    /**  
    * save edit  of  appEmail By id 
    * @pararm int $id appEmail id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEditEmail(Request $request,$id){

            $rules=[
            'email'=>'required|email|unique:app_emails,email,'.$id,

        ];
        
        $message=['email.email'=>'  يحب ادخال ايميل ','email.required'=>'يجب ادخال  الايميل  ','email.unique'=>'يجب ادخال الايميل    :input ',];
        $request->validate($rules,$message);
        
        $appEmail=appEmail::where('id',$id)->first();
        $appEmail->email=$request->email;
        $appEmail->created_at=Carbon::now();
        $appEmail->save();

        \Notify::success('تم تعديل بيانات الايميل    بنجاح', ' تعديل بيانات  الايميل     ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  email 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAddEmail(){
        return view('pages.email.add');
    }    

    /**  
    * save add  of  phone 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAddEmail(Request $request){
            $rules=[
            'email'=>'required|email|unique:app_emails,email'

        ];
        
        $message=['email.email'=>'  يحب ادخال ايميل ','email.required'=>'يجب ادخال  الايميل  ',];
        $request->validate($rules,$message);


        $appPhone=new appEmail;
        $appPhone->email=$request->email;
        $appPhone->created_at=Carbon::now();
        $appPhone->save();
        
        \Notify::success('تم اضافة  الايميل  جديد بنجاح', ' اضافة   الايميل     ');

        return redirect()->back();
    }  
    
    
    /**  
    * save add  of  email 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function deleteEmail(Request $request,$id){


        $appEmail=appEmail::where('id',$id)->delete();
        
        \Notify::success('تم حذف الايميل   بنجاح', ' تم    الايميل  هاتف    ');

        return redirect()->back();
    } 

}
