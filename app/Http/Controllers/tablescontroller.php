<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\restaurant_table;
use App\tableType;

class tablescontroller extends Controller
{
/**  
* show list of tables
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(Request $request){
    $tables=restaurant_table::with('tableType')->where('restaurant_id',$request->id)->get();
    return view('Admin.pages.tables.list',compact('tables'));
    }

    /**  
    * change status of tables (active / deactive)
    * @pararm int $id as id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $ad=restaurant_table::where('id',$id)->first();
    
        if($ad->is_active == 0){
            $ad->is_active = 1;
            $ad->save();
            \Notify::success('تم تفعيل  الطاولة    بنجاح', 'تغير حالة  الطاولة     ');
        }else{
            $ad->is_active = 0;
            $ad->save();
            \Notify::success('تم الغاء تفعيل  الطاولة    بنجاح', 'تغير حالة  الطاولة    ');
        }
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $ad=restaurant_table::where('id',$id)->first();
        $types=tableType::where('restaurant_id',$ad->restaurant_id)->get();
        return view('Admin.pages.tables.edit',compact('ad','types'));
    }    

    /**  
    * save edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

    $rules=[
        'table_id'=>'required','count_from'=>'required','count_to'=>'required','type'=>'required'];
      
      
  
        $request->validate($rules);

        $ad=restaurant_table::where('id',$id)->first();
        $request->table_id ==null ?   :  $ad->table_id=$request->table_id;
        $request->count_from ==null ?   :  $ad->count_from=$request->count_from;
        $request->count_to ==null ?   :  $ad->count_to=$request->count_to;
        $request->type ==null ?   :  $ad->type_id=$request->type;
        $ad->save();

        \Notify::success('تم تعديل بيانات الطاولة   بنجاح', ' تعديل بيانات الطاولة     ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(Request $request)
    {
        $types=tableType::where('restaurant_id',$request->id)->get();

        return view('Admin.pages.tables.add',compact('types'));
    }    

    /**  
    * save add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

        $rules=[
            'table_id'=>'required','count_from'=>'required','count_to'=>'required','type'=>'required'];
          
          
  
  
        $request->validate($rules);

        $ad=new restaurant_table;
        $ad->table_id=$request->table_id;
        $ad->count_from=$request->count_from;
        $ad->count_to=$request->count_to;
        $ad->type_id=$request->type;
        $ad->restaurant_id=$request->id;
        $ad->created_at=Carbon::now();
        $ad->save();
        \Notify::success('تم اضافة  الطاولة    جديد بنجاح', ' اضافة   الطاولة      ');
        return redirect()->back();
    }  
}
