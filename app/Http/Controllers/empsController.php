<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurant_emp;
use Carbon\Carbon;
class empsController extends Controller
{
    /**
    * show list of admins
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function list(Request $request){
        $admins=restaurant_emp::where('restaurant_id',$request->id)->orderBy('is_super','DESC')->get();
        return view('Admin.pages.retaurantEmp.list',compact('admins'));
        }
        /**
        * show info of  admin By id
        * @pararm int $id admin id
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function info($id){
            $admin=restaurant_emp::where('id',$id)->first();
            if($admin->is_super == 0){
                $permissions=json_decode($admin->permissions);
    
                return view('Admin.pages.retaurantEmp.info',compact('admin','permissions'));
            }
    
            return view('Admin.pages.retaurantEmp.info',compact('admin'));
        }
    
        /**
        *  edit  admin By id
        * @pararm int $id admin id
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function formEdit($id){
            $admin=restaurant_emp::where('id',$id)->first();
            if($admin->is_admin == 0){
                $permissions=json_decode($admin->permissions);
    
                return view('Admin.pages.retaurantEmp.edit',compact('admin','permissions'));
            }
            return view('Admin.pages.retaurantEmp.edit',compact('admin'));
        }
    
        /**
        * edit  of  admin By id
        * @pararm int $id admin id
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function submitEdit(Request $request,$id){
    
            $rules=['name'=>'required|max:255','email'=>'required|max:255','password'=>'nullable|min:8'];
             $message=[
            'name.required'=>'يجب ادخال الاسم  ',
            'email.required'=>'يجب ادخال الايميل ',
            'password.min'=>'يجب ادخال ان يكون الرقم السري اكبر من 8',
            "name.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",
            "email.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",
    
    
            ];
    
    
            $request->validate($rules,$message);
    
            if($request->admin == 1){
                $admin=restaurant_emp::where('id',$id)->first();
                $admin->name=$request->name;
                $admin->restaurant_id=\Auth::guard('restaurants')->user()->id;
                $admin->email=$request->email;
                $request->password == NULL ? :$admin->password=\Hash::make($request->password);
                $admin->is_super=1;
                $admin->created_at=Carbon::now();
                $admin->save();
    
            }else{
                $permissions=[
    
                        'Foodcategories'=>['add'=>$request->addFoodcategories,'edit'=>$request->editFoodcategories,'delete'=>$request->deleteFoodcategories],
                        'foods'=>['add'=>$request->addfoods,'edit'=>$request->editfoods,'delete'=>$request->deletefoods],
                        'restaurants'=>['add'=>$request->addrestaurants,'edit'=>$request->editrestaurants,'delete'=>$request->deleterestaurants],
                        'tables'=>['add'=>$request->addtables,'edit'=>$request->edittables,'delete'=>$request->deletetables],
                        'orders'=>['add'=>$request->addorders,'edit'=>$request->editorders,'delete'=>$request->deleteorders],
                        'reservation'=>['add'=>$request->addreservation,'edit'=>$request->editreservation,'delete'=>$request->deletereservation],
                        'webSetting'=>['add'=>$request->addwebSetting,'edit'=>$request->editwebSetting,'delete'=>$request->deletewebSetting],
    
                ];
                $admin=restaurant_emp::where('id',$id)->first();
                $admin->name=$request->name;
                $admin->email=$request->email;
                $admin->restaurant_id=\Auth::guard('restaurants')->user()->id;

                $request->password == NULL ? : $admin->password=\Hash::make($request->password);
                $admin->is_super=0;
                $admin->permissions=json_encode($permissions);
                $admin->created_at=Carbon::now();
                $admin->save();
            }
    
            if($request->admin == 1){
                \Notify::success('تم اضافة  ادمن جديد بنجاح', '  اضافة ادمن ');
            }else{
                \Notify::success('تم اضافة  مسئول جديد بنجاح', '  اضافة مسئول ');
            }
                    return redirect()->back();
        }
    
    
        /**
        * show  form add  of  admins
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function formAdd(){
            return view('Admin.pages.retaurantEmp.add');
        }
    
        /**
        * save add  of  admin
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function submitAdd(Request $request){
    
        $rules=['name'=>'required|max:255','email'=>'required|max:255','password'=>'required|min:8'];
         $message=[
        'name.required'=>'يجب ادخال الاسم  ',
        'email.required'=>'يجب ادخال الايميل ',
        'password.required'=>'يجب ادخال الرقم السري ',
        'password.min'=>'يجب ادخال ان يكون الرقم السري اكبر من 8',
        "name.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",
         "email.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف",
        ];
        $request->validate($rules,$message);
    if($request->admin == 1){
        $admin=new restaurant_emp;
        $admin->name=$request->name;
        $admin->email=$request->email;

        $admin->restaurant_id=\Auth::guard('restaurants')->user()->id;

        $admin->password=\Hash::make($request->password);
        $admin->is_super=1;
        $admin->created_at=Carbon::now();
        $admin->save();
    
    }else{
        $permissions=[
    
            'Foodcategories'=>['add'=>$request->addFoodcategories,'edit'=>$request->editFoodcategories,'delete'=>$request->deleteFoodcategories],
            'foods'=>['add'=>$request->addfoods,'edit'=>$request->editfoods,'delete'=>$request->deletefoods],
            'restaurants'=>['add'=>$request->addrestaurants,'edit'=>$request->editrestaurants,'delete'=>$request->deleterestaurants],
            'tables'=>['add'=>$request->addtables,'edit'=>$request->edittables,'delete'=>$request->deletetables],
            'orders'=>['add'=>$request->addorders,'edit'=>$request->editorders,'delete'=>$request->deleteorders],
            'reservation'=>['add'=>$request->addreservation,'edit'=>$request->editreservation,'delete'=>$request->deletereservation],
            'webSetting'=>['add'=>$request->addwebSetting,'edit'=>$request->editwebSetting,'delete'=>$request->deletewebSetting],

    ];
    
        $admin=new restaurant_emp;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=\Hash::make($request->password);
        $admin->is_super=0;
        $admin->restaurant_id=\Auth::guard('restaurants')->user()->id;

        $admin->permissions=json_encode($permissions);
        $admin->created_at=Carbon::now();
        $admin->save();
    }
    
    if($request->admin == 1){
        \Notify::success('تم اضافة  ادمن جديد بنجاح', '  اضافة ادمن ');
    }else{
        \Notify::success('تم اضافة  مسئول جديد بنجاح', '  اضافة مسئول ');
    }
            return redirect()->back();
        }
    
    
    
    
        /**
        * delete admin By id
        * @pararm int $id admin id
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function delete($id){
            $admin=restaurant_emp::where('id',$id)->delete();
            \Notify::success('تم حذف المستخدم بنجاح', '   تم حذف المستخدم ');
            return redirect()->back();
        }
}
