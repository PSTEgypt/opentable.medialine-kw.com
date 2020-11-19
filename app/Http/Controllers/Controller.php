<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $errorMessage=[
        "404"=>["en"=>"unkown error or network error",'ar'=>'خطاء غير معروف او خطاءفي  الشبكة '],
        "password"=>['en'=>"You have entered an invalid email or password",'ar'=>"لقد ادخلت كلمة المرور خطاء او الايميل "],
        "deactive"=>['en'=>"your account has been deactived",'ar'=>"لقد تم ايقاف الحساب الخاص بك  "],
		"email"=>['en'=>"a verification link has been sent to your email account",'ar'=>"تم إرسال ارتباط التحقق إلى حساب البريد الإلكتروني الخاص بك"],
		"code"=>['en'=>'code is not correct','ar'=>'الكود غير صحيح']
    ];
    /**
 * @param object $object_table object model 
 * @param string  $cloName name of colum 
 * @param string $fileName the name of file 
 * @param string $path the path to save file  
 */
public function SaveFile($object_table,$cloName,$fileName,$path){
    if(request()->hasFile($fileName))
		{
	
			$file = request()->file($fileName);
			$filename = \Str::random(6).'_'.time().'.'.$file->getClientOriginalExtension();
			$file->move($path,$filename);
		
			$object_table->$cloName ="/".$path.'/'.$filename;
		}
  }




	
}
