<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tableType;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| tableTypeController
|--------------------------------------------------------------------------
| this will handle all tableTypeController part (CRUD) 
|
*/

class tableTypeController extends Controller
{
/**  
* show list of type
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(Request $request){
    $types=tableType::where('restaurant_id',$request->id)->get();
    return view('Admin.pages.tabletype.list',compact('types'));
    }
    /**  
    * show info of  type By id
    * @pararm int $id type id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $type=tableType::where('id',$id)->first();
        return view('Admin.pages.tabletype.info',compact('type'));
    }
    

    /**  
    * show  form edit  of  type By id 
    * @pararm int $id type id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){

        $type=tableType::where('id',$id)->first();
        return view('Admin.pages.tabletype.edit',compact('type'));
    }    

    /**  
    * save edit  of  type By id 
    * @pararm int $id type id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['name'=>'required|max:255','name_en'=>'required|max:255'];
        
        $request->validate($rules);

        $type=tableType::where('id',$id)->first();
        $type->name_en=$request->name_en;
        $type->name=$request->name;

        $type->created_at=Carbon::now();
        $type->save();

        \Notify::success('تم تعديل بيانات القسم بنجاح', ' تعديل بيانات القسم   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  type 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd()
    {
         
        return view('Admin.pages.tabletype.add');
    }    

    /**  
    * save add  of  type 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){



    $rules=['name'=>'required|max:255','name_en'=>'required|max:255'];
  
  
  
$request->validate($rules);
        $type=new tableType;
        $type->name=$request->name;
        $type->name_en=$request->name_en;

        $type->restaurant_id=$request->id;
        $type->created_at=Carbon::now();
        $type->save();

        \Notify::success('تم اضافة قسم جديد بنجاح', ' اضافة  القسم   ');
        return redirect()->back();
    }  
}
