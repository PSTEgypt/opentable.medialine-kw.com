<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurant;
use App\category;
use App\type;
use Carbon\Carbon;
use App\restaurant_type;
use App\restaurant_service;
use App\restaurant_image;
use App\restaurant_category;
use App\restaurant_vedio;

class restaurantsController extends Controller
{


    /**  
    * show restaurantInfo of  restaurants By id
    * @pararm int $id restaurants id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function restaurantInfo(Request $request){


         $restaurant=restaurant::where('id',$request->id)
        ->with('services')
        ->with('types')
        ->with('images')
        ->with('payment')
        ->with('food')
        ->with('table')
        ->first();
        return view('Admin.pages.Adminrestaurant.info',compact('restaurant'));
    }    


/**  
    * show  form add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function restaurantEdit(Request $request){
        $types=type::get();
        $restaurant=restaurant::where('id',$request->id)
        ->with('services')
        ->with('types')
        ->with('images')
        ->with('payment')
        ->with('food')
        ->with('table')
        ->first();
        return view('Admin.pages.restaurant.edit',compact('restaurant','types'));
    }    
    
    /**
 * @return Loginform view to chef 
 */
public function showLoginForm()
{
    return view('auth.loginRestaurant');
}

/**
 * @param Request   Illuminate\Http\Request
 * @return redirect To Home if chef email & password is True 
 */
public function login(Request $request)
{
    $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
    

    if (\Auth::guard('restaurants')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

       return redirect()->to('/restaurant/info');
    }else{
     return back()->withInput($request->all());

    
    }
}

public function logout(Request $request) {
    \Auth::guard('restaurants')->logout();
    return redirect('/restaurant/login');
  }


      /**
 * @return Loginform view to chef 
 */
public function showLoginFormEmp()
{
    return view('auth.loginRestaurantEmp');
}

/**
 * @param Request   Illuminate\Http\Request
 * @return redirect To Home if chef email & password is True 
 */
public function loginEmp(Request $request)
{
    $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
    

    if (\Auth::guard('restaurant_emps')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

       return redirect()->to('/restaurant/home');
    }else{
     return back()->withInput($request->all());

    
    }
}

public function logoutEmp(Request $request) {
    \Auth::guard('restaurants')->logout();
    return redirect('/restaurant/login');
  }
/**
 * @return Home view to chef 
 */
public function home()
{

    return view('Admin.pages.restaurant.home');
}
/**  
* show list of restaurants
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){



    $restaurants=restaurant::with('type')->get();
    return view('Admin.pages.restaurant.list',compact('restaurants'));
    }
    /**  
    * show info of  restaurants By id
    * @pararm int $id restaurants id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
         $restaurant=restaurant::where('id',$id)
        ->with('services')
        ->with('types')
        ->with('images')
        ->with('payment')
        ->with('food')
        ->with('table')
        ->first();
        return view('Admin.pages.restaurant.info',compact('restaurant'));
    }
       
   /**  
    * show  form add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){

        $types=type::get();
        
        return view('Admin.pages.restaurant.add',compact('types'));
    }    

    /**  
    * save add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

            // return request();
    $rules=[
        'name'=>'required|max:255',
        'name_en'=>'required|max:255',

        'email'=>'required|email|unique:restaurants,email',
        'phone'=>'required|unique:restaurants,phone',
        'password'=>'required|min:8',
        'images'=>'array',
        'main_image'=>'image',
        'types'=>'required',
        'services'=>'array'
    
    ];

  
  
  
$request->validate($rules);

        $restaurant=new restaurant;
    
        $restaurant->name=$request->name;
        $restaurant->name_en=$request->name_en;

        $restaurant->email=$request->email;
        $restaurant->phone=$request->phone;
        $restaurant->password=\Hash::make($request->password);
        $restaurant->description=$request->description;
        $restaurant->description_en=$request->description_en;

        $restaurant->facebook=$request->facebook;
        $restaurant->instgram=$request->instgram;
        $restaurant->youtube=$request->youtube;
        if($request->hasFile('main_image')){
            $this->SaveFile($restaurant,'main_image','main_image','upload/restaurant');
        }
        $restaurant->created_at=Carbon::now();
        $restaurant->save();

        if($request->types){
        foreach($request->types as $typeId){
            $type=new restaurant_type();
            $type->type_id=$typeId;
            $type->restaurant_id=$restaurant->id;
            $type->save();
        }
    }

if($request->is_reversation){
        if($request->is_reversation){
            $category=new restaurant_category();
            $category->category='reservation';
            $category->restaurant_id=$restaurant->id;
            $category->reservation_price=$request->reservation_price;
            $category->reservation_time=$request->reservation_time;
            $category->reservation_count=$request->reservation_count;
            $category->save();
        }
    }
if($request->url || $request->url[0] !==null){
        foreach($request->url as $url){
            $restaurant_vedio=new restaurant_vedio();
            $restaurant_vedio->vedio=$url;
            $restaurant_vedio->restaurant_id=$restaurant->id;
            $restaurant_vedio->created_at=Carbon::now();
            $restaurant_vedio->save();
        }
        
    }

        if($request->is_delivery){
            $category=new restaurant_category();
            $category->category='delivery';
            $category->restaurant_id=$restaurant->id;
            $category->delivery_price=$request->delivery_price;
            $category->save();
        }        
        if($request->is_crub){
            $category=new restaurant_category();
            $category->category='crub';
            $category->restaurant_id=$restaurant->id;
            $category->save();
        }

        if($request->services){
            foreach ($request->services as  $service) {
                $restaurantService=new restaurant_service();
                $restaurantService->name=$service;
                $restaurantService->restaurant_id=$restaurant->id;
                $restaurantService->save();
            }
        }



        if($request->images){
            foreach ($request->images as  $image) {
                $restaurantImage=new restaurant_image();
                $restaurantImage->restaurant_id=$restaurant->id;
                $file = $image;
                $filename = \Str::random(6).'_'.time().'.'.$file->getClientOriginalExtension();
                $file->move('upload/restaurant',$filename);
                $restaurantImage->image="/upload/restaurant/".$filename;
                $restaurantImage->save();
            }
        }
        

       
        \Notify::success('تم اضافة مطعم   جديد بنجاح', ' اضافة  مطعم     ');
        return redirect()->back();
    }  



    /**  
    * show  form add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
                 $types=type::get();

        $restaurant=restaurant::where('id',$id)
        ->with('services')
        ->with('types')
        ->with('images')
        ->with('payment')
        ->with('food')
        ->with('table')
        ->with('Vedios')
        ->first();
        return view('Admin.pages.restaurant.edit',compact('restaurant','types'));
    }   






    /**  
    * save add  of  restaurant 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){
        $rules=[
            'name'=>'max:255',
            'name_en'=>'max:255',

            'email'=>'email|unique:restaurants,email,'.$id,
            'phone'=>'unique:restaurants,phone,'.$id,
            'images'=>'array',
            'main_image'=>'image',
            'services'=>'array'
        
        ];
    
      
      
      
    $request->validate($rules);
    
            $restaurant=restaurant::where('id',$id)->first();
            $request->name_en == null ? : $restaurant->name_en=$request->name_en;

            $request->name == null ? : $restaurant->name=$request->name;
            $request->email == null ? :$restaurant->email=$request->email;
            $request->phone == null ? :$restaurant->phone=$request->phone;
            $request->password == null ? :$restaurant->password=\Hash::make($request->password);
            $request->description_en == null ? :$restaurant->description_en=$request->description_en;

            $request->description == null ? :$restaurant->description=$request->description;
            $request->facebook == null ? :$restaurant->facebook=$request->facebook;
            $request->instgram == null ? :$restaurant->instgram=$request->instgram;
            $request->youtube == null ? : $restaurant->youtube=$request->youtube;
            if($request->hasFile('main_image')){
                $this->SaveFile($restaurant,'main_image','main_image','upload/restaurant');
            }
            $restaurant->updated_at=Carbon::now();
            $restaurant->save();
    
            if($request->types){
                $delete=restaurant_type::where('restaurant_id',$id)->delete();

            foreach($request->types as $typeId){
                $type=new restaurant_type();
                $type->type_id=$typeId;
                $type->restaurant_id=$restaurant->id;
                $type->save();
            }
        }
    
        $delete= restaurant_category::where('restaurant_id',$id)->delete();

    if($request->is_reversation){
            if($request->is_reversation){
                $category=new restaurant_category();
                $category->category='reservation';
                $category->restaurant_id=$restaurant->id;
                $category->reservation_price=$request->reservation_price;
                $category->reservation_time=$request->reservation_time;
                $category->reservation_count=$request->reservation_count;
                $category->save();
            }
        }
    if($request->url || $request->url[0] !==null){
        $delete= restaurant_vedio::where('restaurant_id',$id)->delete();

            foreach($request->url as $url){
                $restaurant_vedio=new restaurant_vedio();
                $restaurant_vedio->vedio=$url;
                $restaurant_vedio->restaurant_id=$restaurant->id;
                $restaurant_vedio->created_at=Carbon::now();
                $restaurant_vedio->save();
            }
            
        }
    
            if($request->is_delivery){
                $category=new restaurant_category();
                $category->category='delivery';
                $category->restaurant_id=$restaurant->id;
                $category->delivery_price=$request->delivery_price;
                $category->save();
            }        
            if($request->is_crub){
                $category=new restaurant_category();
                $category->category='curb';
                $category->restaurant_id=$restaurant->id;
                $category->save();
            }
    
            if($request->services){
                $delete=restaurant_service::where('restaurant_id',$id)->delete();

                foreach ($request->services as  $service) {
                    $restaurantService=new restaurant_service();
                    $restaurantService->name=$service;
                    $restaurantService->restaurant_id=$restaurant->id;
                    $restaurantService->save();
                }
            }
    
    
    
            if($request->images){
                foreach ($request->images as  $image) {
                    $restaurantImage=new restaurant_image();
                    $restaurantImage->restaurant_id=$restaurant->id;
                    $file = $image;
                    $filename = \Str::random(6).'_'.time().'.'.$file->getClientOriginalExtension();
                    $file->move('upload/restaurant',$filename);
                    $restaurantImage->image="/upload/restaurant/".$filename;
                    $restaurantImage->save();
                }
            }
            
    
           
            \Notify::success('تم اضافة مطعم   جديد بنجاح', ' اضافة  مطعم     ');
            return redirect()->back();
        }  

    /**  
    * save add || delete photo  of  restaurant By id 
    * @param int $id restaurant id  || image id
    * @param INT $request->action (add || delete)
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function uploadrestaurantImage(Request $request,$id){


        if($request->action =='add'){
            if($request->hasFile('images')){
           

                foreach($request->images as $images){
                    $restaurantImages=new restaurant_image();
                    $filename = \Str::random(6).'_'.time().'.'.$images->getClientOriginalExtension();
                    $images->move('upload/restaurants',$filename );
    
                     $restaurantImages->image="/upload/restaurants/".$filename;
                     $restaurantImages->restaurant_id=$id;
                     $restaurantImages->save();
                }
                
            }
            \Notify::success('تم اضافة صورة   المطعم    بنجاح', ' اضافة صور المطعم     ');

        }


        if($request->action =="delete"){
            $restaurantImage=restaurant_image::where('id',$id)->delete();
            \Notify::success('تم حذف  الصورة   بنجاح', ' تعديل حذف الصورة    ');

        }

       


        return redirect()->back();
    }  





/**  
* delete(soft delete ) restaurant By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function delete($id){
    $restaurant=restaurant::where('id',$id)->delete();
    \Notify::success('تم حذف  المطعم    بنجاح', ' تم الحذف بنجاح    ');
    return redirect()->back();
} 
}
