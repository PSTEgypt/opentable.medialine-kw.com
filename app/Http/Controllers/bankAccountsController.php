<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bankAccounts;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| bankAccountsController
|--------------------------------------------------------------------------
| this will handle all bankAccounts part (CRUD) 
|
*/
/***
 *      _                 _                                       _       
 *     | |               | |       /\                            | |      
 *     | |__   __ _ _ __ | | __   /  \   ___ ___ ___  _   _ _ __ | |_ ___ 
 *     | '_ \ / _` | '_ \| |/ /  / /\ \ / __/ __/ _ \| | | | '_ \| __/ __|
 *     | |_) | (_| | | | |   <  / ____ \ (_| (_| (_) | |_| | | | | |_\__ \
 *     |_.__/ \__,_|_| |_|_|\_\/_/    \_\___\___\___/ \__,_|_| |_|\__|___/
 *                                                                        
 *                                                                        
 */
class bankAccountsController extends Controller
{
/**  
* show list of bankAccounts
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $bankAccounts=bankAccounts::get();
    return view('pages.bankAccounts.list',compact('bankAccounts'));
    }
    /**  
    * show info of  bankAccounts By id
    * @pararm int $id bankAccounts id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $bankAccount=bankAccounts::where('id',$id)->first();
        return view('pages.bankAccounts.info',compact('bankAccount'));
    }
    /**  
    * change status of bankAccount (active / deactive)
    * @pararm int $id bankAccount id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $bankAccount=bankAccounts::where('id',$id)->first();
    
        if($bankAccount->is_active == 0){
            $bankAccount->is_active = 1;
            $bankAccount->save();
            \Notify::success('تم تفعيل الحساب البنكي بنجاح', 'تغير حالة الحساب البنكي  ');
        }else{
            $bankAccount->is_active = 0;
            $bankAccount->save();
            \Notify::success('تم الغاء تفعيل الحساب البنكي بنجاح', 'تغير حالة الحساب البنكي ');
        }
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  bankAccount By id 
    * @pararm int $id bankAccount id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $bankAccount=bankAccounts::where('id',$id)->first();
        return view('pages.bankAccounts.edit',compact('bankAccount'));
    }    

    /**  
    * save edit  of  bankAccount By id 
    * @pararm int $id bankAccount id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

            $rules=[
            'name_ar'=>'required|max:255',
            'name_en'=>'required|max:255',
            'account_number'=>'required',
            'person_name'=>'required|max:255',
            
        ];
            $message=[
      'name_ar.required'=>'يجب ادخال اسم القسم ',
      'name_en.required'=>'يجب ادخال اسم القسم',
      'account_number.required'=>'يحب ادخال اسم الحساب',
      'person_name.required'=>'يجب ادخال اسم الشخص',
      'image.required'=>'يجب ادخال الصور',
      "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",  
      "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",  
      "person_name.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",  
      ];
        $request->validate($rules,$message);

        $bankAccount=bankAccounts::where('id',$id)->first();
        $bankAccount->name_ar=$request->name_ar;
        $bankAccount->name_en=$request->name_en;
        $bankAccount->account_number=$request->account_number;
        $bankAccount->person_name=$request->person_name;
        $bankAccount->ipan=$request->ipan;
        $bankAccount->is_active=$request->active ? $request->active : 0;
        if($request->hasFile('image')){
            $this->SaveFile($bankAccount,'image','image','upload/bankAccount');
        }

        $bankAccount->created_at=Carbon::now();
        $bankAccount->save();

        \Notify::success('تم تعديل بيانات الحساب البنكي بنجاح', ' تعديل بيانات الحساب البنكي   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  bankAccount 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.bankAccounts.add');
    }    

    /**  
    * save add  of  bankAccount 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
        $rules=[
            'name_ar'=>'required|max:255',
            'name_en'=>'required|max:255',
            'account_number'=>'required',
            'person_name'=>'required|max:255',
            'image'=>'required'
        ];
          $message=[
      'name_ar.required'=>'يجب ادخال اسم القسم ',
      'name_en.required'=>'يجب ادخال اسم القسم',
      'account_number.required'=>'يحب ادخال اسم الحساب',
      'person_name.required'=>'يجب ادخال اسم الشخص',
      'image.required'=>'يجب ادخال الصور',
      "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",  
      "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",  
      "person_name.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",  
      ];
        $request->validate($rules,$message);


        $bankAccount=new bankAccounts; 
        $bankAccount->name_ar=$request->name_ar;
        $bankAccount->name_en=$request->name_en;
        $bankAccount->account_number=$request->account_number;
        $bankAccount->person_name=$request->person_name;
        $bankAccount->ipan=$request->ipan;
        $bankAccount->is_active=$request->active ? $request->active : 0;
        if($request->hasFile('image')){
            $this->SaveFile($bankAccount,'image','image','upload/bankAccount');
        }
        $bankAccount->created_at=Carbon::now();
        $bankAccount->save();
        \Notify::success('تم اضافة حساب بنكي جديد بنجاح', ' اضافة  حساب بنكي   ');

        return redirect()->back();
    }  
}
