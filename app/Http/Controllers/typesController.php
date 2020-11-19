<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| typesController
|--------------------------------------------------------------------------
| this will handle all type part (CRUD) 
|
*/

class typesController extends Controller
{
/**  
* show list of type
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list()
{
    $types=type::get();

    return view('Admin.pages.types.list',compact('types'));


    //return view('pages.types.list',compact('types'));
    }
    /**  
    * show info of  type By id
    * @pararm int $id type id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
         $type=type::where('id',$id)->first();
        return view('Admin.pages.types.info',compact('type'));
    }
    

    /**  
    * show  form edit  of  type By id 
    * @pararm int $id type id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){


            $type=type::where('id',$id)->first();
        return view('Admin.pages.types.edit',compact('type'));
    }    

    /**  
    * save edit  of  type By id 
    * @pararm int $id type id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){


 
        $rules=
        [
            'name'=>'required|max:255',
            'description'=>'required|max:255',
        'name_en'=>'required|max:255',
        'description_en'=>'required|max:255'
    ];

   
        
        $request->validate($rules);
        $type=type::where('id',$id)->first();
        $type->name=$request->name;
        $type->description=$request->description;
        $type->name_en=$request->name_en;
        $type->description_en=$request->description_en;
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
    public function formAdd(){
        return view('Admin.pages.types.add');
    }    

    /**  
    * save add  of  type 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request)
    {

     

    $rules=['name'=>'required|max:255','description'=>'required|max:255',
            'name_en'=>'required|max:255','description_en'=>'required|max:255'
           ];
  
  
  
$request->validate($rules);
        $type=new type;
        $type->name=$request->name;
        $type->description=$request->description;
        $type->name_en=$request->name_en;
        $type->description_en=$request->description_en;
        $type->created_at=Carbon::now();
        $type->save();

        \Notify::success('تم اضافة قسم جديد بنجاح', ' اضافة  القسم   ');
        return redirect()->back();
    }  
}
