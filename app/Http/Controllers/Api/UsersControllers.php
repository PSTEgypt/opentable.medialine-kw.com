<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\user as Users;
use Illuminate\Support\Str;
use Exception;
use Validator;
use Illuminate\Validation\Rule;

use App\Users as user;

/*
|--------------------------------------------------------------------------
| UsersControllers
|--------------------------------------------------------------------------
| Description: This api will be used to login ,register ,forget, reset password ,virify code
|
*/


class UsersControllers extends Controller
{
/**
                     _                _       
 _   _ ___  ___ _ __| |    ___   __ _(_)_ __  
| | | / __|/ _ \ '__| |   / _ \ / _` | | '_ \ 
| |_| \__ \  __/ |  | |__| (_) | (_| | | | | |
 \__,_|___/\___|_|  |_____\___/ \__, |_|_| |_|
                                |___/  
 */   


/**  
* login Api 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed 
* @return Json 
*/
public function login(Request $request)
{

    try{
        $rules = [
            "email"=>'required|exists:users,email|email|max:255',
            "password"=>"required|min:8", 
        
        ];
    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()) {
        return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
    }

//Start logic
    $user=user::where('email',$request->email)->first();
    //check user Active
    if($user->is_active == 1){

    //check password    
    if(\Hash::check($request->password,$user->password)){
        return response()->json(['status' =>true,"message"=>"","user"=>  new Users($user)]);

    }else{
        return response()->json(['status' =>false,"message"=>$this->errorMessage['password'][$request->lang]]);

    }
}else{
    return response()->json(['status' =>false,"message"=>$this->errorMessage['deactive'][$request->lang]]);

}



//end logic

	}catch(\Exception $e) {
       return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang]]);
 	}
}


/**
                     ____            _     _            
 _   _ ___  ___ _ __|  _ \ ___  __ _(_)___| |_ ___ _ __ 
| | | / __|/ _ \ '__| |_) / _ \/ _` | / __| __/ _ \ '__|
| |_| \__ \  __/ |  |  _ <  __/ (_| | \__ \ ||  __/ |   
 \__,_|___/\___|_|  |_| \_\___|\__, |_|___/\__\___|_|   
                               |___/                    
 */

/**  
* Register Api 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed 
* @return Json 
*/
public function register(Request $request)
{

    try{
        $rules = [

            'name'=>"required|max:255|alpha_num",
            "phone"=>'required|max:255',
            "email"=>'required|unique:users,email|email|max:255',
            "password"=>"required|min:8", 
            'longitude'=>'required',
            "latitude"=>'required'
        
        ];
    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()) {
        return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
    }

//Start logic
    $user=new user();
    $user->api_token=Str::random(64);
    $user->name=$request->name;
    $user->phone=$request->phone;
    $user->email=$request->email;
    $user->password=\Hash::make($request->password);
    $user->is_accept=1;
    $user->is_active=1;
    $user->longitude=$request->longitude;
    $user->latitude=$request->latitude;
    $user->save();

    return response()->json(['status' =>true,"message"=>"","user"=>  new Users($user)]);

//end logic

	}catch(Exception $e) {
       return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang]]);
 	}

}



/**
 _____                    _   ____                                     _ 
|  ___|__  _ __ __ _  ___| |_|  _ \ __ _ ___ _____      _____  _ __ __| |
| |_ / _ \| '__/ _` |/ _ \ __| |_) / _` / __/ __\ \ /\ / / _ \| '__/ _` |
|  _| (_) | | | (_| |  __/ |_|  __/ (_| \__ \__ \\ V  V / (_) | | | (_| |
|_|  \___/|_|  \__, |\___|\__|_|   \__,_|___/___/ \_/\_/ \___/|_|  \__,_|
               |___/                                                     
 */



/**  
* forgetPassword Api 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed 
* @return Json 
*/
public function forgetPassword(Request $request)
{
    
    try{
        $rules = [
            "email"=>'required|exists:users,email|email|max:255',
        
        ];
    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()) {
        return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
    }

//Start logic
    $user=user::where('email',$request->email)->first();
    //check user Active
    if($user->is_active == 1){
        
        $user->code=Str::random(6);
        $user->save();

        // $this->sendEmail('Websitereset',$request->email,$password->token,'resetPassword');
        
        return response()->json(['status' =>true,"message"=>'']);


}else{
    return response()->json(['status' =>false,"message"=>$this->errorMessage['deactive'][$request->lang]]);

}



//end logic

	}catch(\Exception $e) {
       return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang],"error"=>$e->getMessage()]);
 	}
}

/**
 * This api will be used in 1 cases to validate the user verification code.
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
public function validateCode(Request $request)
{
    $rules = [
        'email' => 'required|email',
        'code' => 'required',
    ];

    try {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message' => $validator->errors()->first()]);
        }
        #Start logic

        $user = user::where('email', $request->email)->where('code', $request->code)->first();
        #company

        if (!$user == null) {
            $user->code = null;
            $user->tmpApiToken = \Str::random(64);
            $user->save();
            return response()->json(['status' =>true,"message"=>'','tmpApiToken' => $user->tmpApiToken]);

        }


        return response()->json(['status'=>false,'message' => $this->errorMessage['code']['en']]);
        


   
        #end logic
    } catch (Exception $e) {
        return response()->json(['status'=>false,'message' => $this->errorMessage['404']['en'],'error'=>$e->getMessage()]);
    }
} // end funcrion

/**
* This api will be used to change the password of the  user if his account is exists.
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function changePassword(Request $request)
{
    $rules = [
        'tmpApiToken' => 'required',
        'newPassword' => 'required|min:8',
    ];

    $messages = [
        'tmpApiToken.required' => '400',
        'newPassword.required' => '400',
        'newPassword.min' => '400',
    ];
    try {
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message' =>  $validator->errors()->first()]);
        }
        #Start logic
        $user = user::where('tmpApiToken', $request->tmpApiToken)->first();
        #company

        if (!$user == null) {
            $user->code = null;
            $user->tmpApiToken = null;
            $user->password = \Hash::make($request->newPassword);
            $user->save();
        }

        return response()->json(['status'=>true,'message' => '']);
        #end logic
    } catch (Exception $e) {
        return response()->json(['status'=>false,'message' => $this->errorMessage['404']['en']]);
    }
} // end funcrion

/**
                 _       _       ____             __ _ _      
 _   _ _ __   __| | __ _| |_ ___|  _ \ _ __ ___  / _(_) | ___ 
| | | | '_ \ / _` |/ _` | __/ _ \ |_) | '__/ _ \| |_| | |/ _ \
| |_| | |_) | (_| | (_| | ||  __/  __/| | | (_) |  _| | |  __/
 \__,_| .__/ \__,_|\__,_|\__\___|_|   |_|  \___/|_| |_|_|\___|
      |_|                                                     
 */



/**  
* update profile Api 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed 
* @return Json 
*/    

public function updateProfile(Request $request)
{
    try{
        $rules = [
            "apiToken"=>"required|exists:users,api_token",
            'name'=>"max:255|alpha_num",
            "phone"=>'max:255',
            "password"=>"min:8",
            'image'=>'',

        
        
        ];
        $this->rules['email']=[  'email',
            Rule::unique('users','email')->ignore($request->apiToken,'api_token')];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
        }
    
    //Start logic
        $user=user::where('api_token',$request->apiToken)->first();

        $request->name == null? : $user->name=$request->name;
        $request->phone == null? :  $user->phone=$request->phone;
        $request->email == null? :  $user->email=$request->email;
        $request->password == null? :  $user->password=\Hash::make($request->password);

        if($request->image){
            $this->SaveFile($user,'image','image','uploads/users');
        }
        $user->save();
    
        return response()->json(['status' =>true,"message"=>"","user"=>  new Users($user)]);
    
    //end logic
    
        }catch(Exception $e) {
           return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang]]);
         }
}


/**  
* fmcNotification Api 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed 
* @return Json 
*/    

public function fmcNotification(Request $request)
{
    try{
        unset($this->rules);
        $this->rules['fcmToken']=[  'required',
            Rule::unique('users','fcm_token')->ignore($request->apiToken,'api_token')];
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()) {
            return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
        }
    
    //Start logic
        $user=user::where('api_token',$request->apiToken)->first();

        $user->fcm_token=$request->fcmToken;
        $user->save();
    
        return response()->json(['status' =>true,"message"=>""]);
    
    //end logic
    
        }catch(Exception $e) {
           return response()->json(['status' =>false,"message"=>$this->errorMessage['404'][$request->lang]]);
         }
}
}
