<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\timework;
use Carbon\Carbon;
class timeworkController extends Controller
{
/**  
* show list of tables
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(Request $request){
    $tables=timework::where('restaurant_id',$request->id)->get();
    return view('Admin.pages.timework.list',compact('tables'));
    }

    /**  
    * change status of tables (active / deactive)
    * @pararm int $id as id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $ad=timework::where('id',$id)->delete();
        \Notify::success('تم حذف  الموعد   بنجاح', ' حذف الموعد      ');

      
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $ad=timework::where('id',$id)->first();

        return view('Admin.pages.timework.edit',compact('ad'));
    }    

    /**  
    * save edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

    $rules=[
        'day'=>'required','work_from'=>'required','work_to'=>'required'];
      
      
  
        $request->validate($rules);

        $ad=timework::where('id',$id)->first();
        $request->day ==null ?   :  $ad->day=$request->day;
        $request->work_from ==null ?   :  $ad->work_from=$request->work_from;
        $request->work_to ==null ?   :  $ad->work_to=$request->work_to;
        $ad->save();

        \Notify::success('تم تعديل بيانات موعد عمل   بنجاح', ' تعديل بيانات موعد عمل     ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('Admin.pages.timework.add');
    }    

    /**  
    * save add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

        $rules=[
            'day'=>'required','work_from'=>'required','work_to'=>'required'];
          
          
  
  
        $request->validate($rules);

        $ad=new timework;
        $ad->day=$request->day;
        $ad->work_from=$request->work_from;
        $ad->work_to=$request->work_to;
        $ad->restaurant_id=$request->id;
        $ad->created_at=Carbon::now();
        $ad->save();
        \Notify::success('تم اضافة  موعد عمل    جديد بنجاح', ' اضافة   موعد عمل      ');
        return redirect()->back();
    }  
}
