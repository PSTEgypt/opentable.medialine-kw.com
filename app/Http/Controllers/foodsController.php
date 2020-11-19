<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\restaurant_food;
use App\foodCategory;
class foodsController extends Controller
{
/**  
* show list of ads
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(Request $request)
{

     $ads=restaurant_food::where('restaurant_id',$request->id)->get();
    return view('Admin.pages.Foods.list',compact('ads'));
    }

    /**  
    * change status of ads (active / deactive)
    * @pararm int $id as id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $ad=ads::where('id',$id)->first();
    
        if($ad->is_active == 0){
            $ad->is_active = 1;
            $ad->save();
            \Notify::success('تم تفعيل  الوجبة   بنجاح', 'تغير حالة  الوجبة    ');
        }else{
            $ad->is_active = 0;
            $ad->save();
            \Notify::success('تم الغاء تفعيل  الوجبة   بنجاح', 'تغير حالة  الوجبة   ');
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
        $ad=restaurant_food::where('id',$id)->first();
        $foods=foodCategory::get();

        return view('Admin.pages.Foods.edit',compact('ad','foods'));
    }    

    /**  
    * save edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

    $rules=[
        'name'=>'required','price'=>'required','description'=>'required',
        'name_en'=>'required','description_en'=>'required'

    
    ];
      
      
  
        $request->validate($rules);

        $ad=restaurant_food::where('id',$id)->first();
        $request->name ==null ?   :  $ad->name=$request->name;
        $request->price ==null ?   :  $ad->price=$request->price;
        $request->description_en ==null ?   :  $ad->description_en=$request->description_en;
        $request->name_en ==null ?   :  $ad->name_en=$request->name_en;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/ad');
        }
        $ad->save();

        \Notify::success('تم تعديل بيانات الوجبة  بنجاح', ' تعديل بيانات الوجبة    ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(Request $request){
        $foods=foodCategory::where('restaurant_id',$request->id)->get();
        return view('Admin.pages.Foods.add',compact('foods'));
    }    

    /**  
    * save add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

               

    $rules=[
        'name'=>'required','image'=>'required|image','price'=>'required','description'=>'required',
        'name_en'=>'required','description_en'=>'required'
    ];
  
  
  
$request->validate($rules);

        $ad=new restaurant_food;
        $ad->price=$request->price;
        $ad->name=$request->name;
        $ad->name_en=$request->name_en;
        $ad->restaurant_id=$request->id;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/ad');
        }
        $ad->description_en=$request->description_en;
        $ad->description=$request->description;
        $ad->created_at=Carbon::now();
        $ad->save();
        \Notify::success('تم اضافة  وجبة   جديد بنجاح', ' اضافة   وجبة     ');
        return redirect()->back();
    }  


     public function delete($id){
        $restaurant_food=restaurant_food::where('id',$id)->delete();
          \Notify::success('تم الحذف الوجبة بنجاح', '   تم حذف الوجبة ');
        return redirect()->back();
    }

}