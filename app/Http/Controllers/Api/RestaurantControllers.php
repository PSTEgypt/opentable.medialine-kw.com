<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\restaurantType;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Validation\Rule;
use App\type;

class RestaurantControllers extends Controller
{
   
 /**
 _   _                      
| | | | ___  _ __ ___   ___ 
| |_| |/ _ \| '_ ` _ \ / _ \
|  _  | (_) | | | | | |  __/
|_| |_|\___/|_| |_| |_|\___|
                            
 */
    /**  
    * home Api 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed 
    * @return Json 
    */
    public function home(Request $request)
    {
        try{
            $rules = [
                "apiToken"=>'exists:users,api_token',
            
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
            }
        
        //Start logic
         $typeRestaurant=type::with('restaurant')->get();

         
        return response()->json(['status' =>true,"message"=>"",'restaurantCategories'=>restaurantType::collection($typeRestaurant)]);
    
        //end logic
        
            }catch(\Exception $e) {
               return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang],'error'=>$e->getMessage()]);
             }
        
    }
  


    /**  
    * category Api 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed 
    * @return Json 
    */
    public function category(Request $request)
    {
        try{
            $rules = [
                "categoryId"=>'required|exists:type,id',
            
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
            }
      
        //Start logic
         $typeRestaurant=type::where('id',$request->categoryId)->with('restaurant')->first();
         dd($typeRestaurant);
        return response()->json(['status' =>true,"message"=>"",'restaurant'=>restaurantType::collection($typeRestaurant)]);
    
        //end logic
        
            }catch(\Exception $e) {
               return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang],'error'=>$e->getMessage()]);
             }
        
    }
}
