<?php

Route::get('/restaurant/login','restaurantsController@showLoginForm')->name('restaurant.loginForm');
Route::post('/restaurant/login','restaurantsController@login')->name('restaurant.login');

Route::get('/restaurant/emp/login','restaurantsController@showLoginFormEmp')->name('restaurant.emp.loginForm');
Route::post('/restaurant/emp/login','restaurantsController@loginEmp')->name('restaurant.emp.login');

Route::get('/logout', 'restaurantsController@logout')->name('restaurants.logout');

Route::group(['middleware'=>['restaurant'],'prefix'=>'restaurant'], function() {

Route::get('/home','restaurantsController@home')->name('restaurant.home');

Route::get('/logout', 'restaurantsController@logoutEmp')->name('restaurant.emp.logout');

Route::get('/info', 'restaurantsController@restaurantInfo')->name('restaurant.info');

Route::get('/edit', 'restaurantsController@restaurantEdit')->name('restaurant.edit');

Route::post('/edit', 'restaurantsController@restaurantEdit')->name('restaurant.Edit.Submit');

Route::post('/add/image/{id}', 'restaurantsController@uploadrestaurantImage')->name('restaurant.add.image');

Route::post('/delete/image/{id}', 'restaurantsController@uploadrestaurantImage')->name('restaurant.delete.image');

/*
|--------------------------------------------------------------------------
| tableTypeController Section          
|--------------------------------------------------------------------------
| this will handle all tableTypeController part
*/
Route::get('/tableTypes','tableTypeController@list')->name('tableTypes');
Route::get('/tableType/info/{id}','tableTypeController@info')->name('tableType.info')->where('id', '[0-9]+');
Route::get('/tableType/status/{id}','tableTypeController@status')->name('tableType.status')->where('id', '[0-9]+');
Route::get('/tableType/edit/{id}','tableTypeController@formEdit')->name('tableType.edit')->where('id', '[0-9]+');
Route::post('/tableType/edit/{id}','tableTypeController@submitEdit')->name('tableType.edit.submit')->where('id', '[0-9]+');
Route::get('/tableType/add','tableTypeController@formAdd')->name('tableType.add');
Route::post('/tableType/add','tableTypeController@submitAdd')->name('tableType.add.submit');
#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| reservation Section
|--------------------------------------------------------------------------
| this will handle all reservation part
*/
Route::get('/reservations','reservationController@list')->name('reservations');
Route::get('/reservation/user/info/{id}','reservationController@Userinfo')->name('reservations.user.info')->where('id', '[0-9]+');
Route::get('/reservation/accept/{id}','reservationController@accept')->name('reservation.accept')->where('id', '[0-9]+');
Route::get('/reservation/cancel/{id}','reservationController@cancel')->name('reservation.cancel')->where('id', '[0-9]+');
Route::get('/reservation/cancelByuser/','reservationController@cancelByuser')->name('reservations.cancelByuser')->where('id', '[0-9]+');
Route::get('/reservation/cancelByrestaurant/','reservationController@cancelByrestaurant')->name('reservations.cancelByrestaurant')->where('id', '[0-9]+');
Route::get('/reservation/accepted/','reservationController@accepted')->name('reservations.user.info')->where('id', '[0-9]+');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| User Orders
|--------------------------------------------------------------------------
| this will handle all orders part
*/
Route::get('/orders','ordersController@list')->name('orders');
Route::get('/order/info/{id}','ordersController@info')->name('order.info')->where('id', '[0-9]+');
Route::get('/order/accept/{id}','ordersController@accept')->name('order.accept')->where('id', '[0-9]+');
Route::get('/order/delivered/{id}','ordersController@delivered')->name('order.delivered')->where('id', '[0-9]+');
Route::get('/order/cancel/{id}','ordersController@cancel')->name('order.cancel')->where('id', '[0-9]+');

Route::get('/order/delivery','ordersController@delivery')->name('delivery');
Route::get('/order/cancel','ordersController@cancelOrder')->name('cancel');
Route::get('/order/accepted','ordersController@accepted')->name('accepted');



#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| timeworks Section 
|--------------------------------------------------------------------------
| this will handle all timeworks part
*/
Route::get('/timeworks','timeworkController@list')->name('timeworks');
Route::get('/timework/edit/{id}','timeworkController@formEdit')->name('timework.edit ')->where('id', '[0-9]+');
Route::post('/timework/edit/{id}','timeworkController@submitEdit')->name('timework.submitEdit')->where('id', '[0-9]+');
Route::get('/timework/add','timeworkController@formAdd')->name('timework.add');
Route::post('/timework/add','timeworkController@submitAdd')->name('timework.add.submit');
Route::get('/timework/delete/{id}','timeworkController@delete')->name('timework.delete')->where('id', '[0-9]+');

#----------------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| admin Section
|--------------------------------------------------------------------------
| this will handle all admin  part
*/


Route::get('/emps','empsController@list')->name('emps');
Route::get('/emp/info/{id}','empsController@info')->name('emp.info')->where('id', '[0-9]+');
Route::get('/emp/permission/{id}','empsController@status')->name('emp.permission')->where('id', '[0-9]+');
Route::get('/emp/edit/{id}','empsController@formEdit')->name('emp.edit')->where('id', '[0-9]+');
Route::post('/emp/edit/{id}','empsController@submitEdit')->name('emp.edit.submit')->where('id', '[0-9]+');
Route::get('/emp/add','empsController@formAdd')->name('emp.add');
Route::get('/emp/delete/{id}','empsController@delete')->name('emp.delete');
Route::post('/emp/add','empsController@submitAdd')->name('emp.add.submit');

#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| foodCategory Section          
|--------------------------------------------------------------------------
| this will handle all type part
*/
Route::get('/foodCategorys','foodCategoryController@list')->name('foodCategorys');
Route::get('/foodCategory/info/{id}','foodCategoryController@info')->name('foodCategory.info')->where('id', '[0-9]+');
Route::get('/foodCategory/status/{id}','foodCategoryController@status')->name('foodCategory.status')->where('id', '[0-9]+');
Route::get('/foodCategory/edit/{id}','foodCategoryController@formEdit')->name('foodCategory.edit')->where('id', '[0-9]+');
Route::post('/foodCategory/edit/{id}','foodCategoryController@submitEdit')->name('foodCategory.edit.submit')->where('id', '[0-9]+');
Route::get('/foodCategory/add','foodCategoryController@formAdd')->name('foodCategory.add');
Route::post('/foodCategory/add','foodCategoryController@submitAdd')->name('foodCategory.add.submit');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| food Section 
|--------------------------------------------------------------------------
| this will handle all food part
*/
Route::get('/food','foodsController@list')->name('foods');

Route::get('/food/info/{id}','foodsController@info')->name('food.info')->where('id', '[0-9]+');
Route::get('/food/status/{id}','foodsController@status')->name('food.status')->where('id', '[0-9]+');

Route::get('/food/edit/{id}','foodsController@formEdit')->name('food.edfood ')->where('id', '[0-9]+');

Route::post('/food/edit/{id}','foodsController@submitEdit')->name('food.submitEdit')->where('id', '[0-9]+');


Route::get('/food/add','foodsController@formAdd')->name('food.add');
Route::post('/food/add','foodsController@submitAdd')->name('food.add.submfood ');

Route::get('/food/delete/{id}','foodsController@delete')->name('food.delete ');

#----------------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| table Section 
|--------------------------------------------------------------------------
| this will handle all ads part
*/
Route::get('/tables','tablescontroller@list')->name('tables');

Route::get('/table/info/{id}','tablescontroller@info')->name('table.info')->where('id', '[0-9]+');
Route::get('/table/status/{id}','tablescontroller@status')->name('table.status')->where('id', '[0-9]+');
Route::get('/table/edit/{id}','tablescontroller@formEdit')->name('table.edit ')->where('id', '[0-9]+');
Route::post('/table/edit/{id}','tablescontroller@submitEdit')->name('table.submitEdit')->where('id', '[0-9]+');
Route::get('/table/add','tablescontroller@formAdd')->name('table.add');
Route::post('/table/add','tablescontroller@submitAdd')->name('table.add.submit ');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| restaurant emp Section
|--------------------------------------------------------------------------
| this will handle all restaurant emp  part
*/
Route::group(['middleware' => 'superRestaurant'], function()
{
    Route::get('/admins','adminsController@list')->name('admins');
    Route::get('/admin/info/{id}','adminsController@info')->name('admin.info')->where('id', '[0-9]+');
    Route::get('/admin/permission/{id}','adminsController@status')->name('admin.permission')->where('id', '[0-9]+');
    Route::get('/admin/edit/{id}','adminsController@formEdit')->name('admin.edit')->where('id', '[0-9]+');
    Route::post('/admin/edit/{id}','adminsController@submitEdit')->name('admin.edit.submit')->where('id', '[0-9]+');
    Route::get('/admin/add','adminsController@formAdd')->name('admin.add');
    Route::get('/admin/delete/{id}','adminsController@delete')->name('admin.delete');
    Route::post('/admin/add','adminsController@submitAdd')->name('admin.add.submit');
});
#----------------------------------------------------------------------------------


});

Route::group(['middleware' => ['auth'],'prefix'=>'admin'], function() {


/*
|--------------------------------------------------------------------------
| type Section
|--------------------------------------------------------------------------
| this will handle all type part
*/
Route::get('/types','typesController@list')->name('types');

Route::get('/type/info/{id}','typesController@info')->name('type.info')->where('id', '[0-9]+');

Route::get('/type/status/{id}','typesController@status')->name('type.status')->where('id', '[0-9]+')->middleware('role:type,edit');

Route::get('/type/edit/{id}','typesController@formEdit')->name('type.edit')->where('id', '[0-9]+')->middleware('role:type,edit');

Route::post('/type/edit/{id}','typesController@submitEdit')->name('type.edit.submit')->where('id', '[0-9]+')->middleware('role:type,edit');

Route::get('/type/add','typesController@formAdd')->name('type.add')->middleware('role:type,add');


Route::post('/type/add','typesController@submitAdd')->name('type.add.submit')->middleware('role:type,add');
#----------------------------------------------------------------------------------





/*
|--------------------------------------------------------------------------
| payment Section
|--------------------------------------------------------------------------
| this will handle all payment part
*/
Route::get('/payments','paymentControllers@list')->name('payments')->middleware('role:type,add');
Route::get('/payment/add','paymentControllers@formAdd')->name('payment.add')->middleware('role:type,add');
Route::post('/payment/add','paymentControllers@submitAdd')->name('payment.add.submit')->middleware('role:type,add');
Route::get('/payment/delete/{id}','paymentControllers@delete')->name('payment.delete')->middleware('role:type,add');
Route::get('/payment/pay/{id}','paymentControllers@pay')->name('payment.pay')->middleware('role:type,add');
Route::get('/payment/unSubscription','paymentControllers@unSubscription')->name('payment.unSubscription')->middleware('role:type,add');
Route::get('/payment/ended','paymentControllers@ended')->name('payment.ended')->middleware('role:type,add');


#----------------------------------------------------------------------------------





/*
|--------------------------------------------------------------------------
| admin Section
|--------------------------------------------------------------------------
| this will handle all admin  part
*/
Route::group(['middleware' => 'superAdmin'], function()
{
    Route::get('/admins','adminsController@list')->name('admins');
    Route::get('/admin/info/{id}','adminsController@info')->name('admin.info')->where('id', '[0-9]+');
    Route::get('/admin/permission/{id}','adminsController@status')->name('admin.permission')->where('id', '[0-9]+');
    Route::get('/admin/edit/{id}','adminsController@formEdit')->name('admin.edit')->where('id', '[0-9]+');
    Route::post('/admin/edit/{id}','adminsController@submitEdit')->name('admin.edit.submit')->where('id', '[0-9]+');
    Route::get('/admin/add','adminsController@formAdd')->name('admin.add');
    Route::get('/admin/delete/{id}','adminsController@delete')->name('admin.delete');
    Route::post('/admin/add','adminsController@submitAdd')->name('admin.add.submit');
});
#----------------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| restaurants Section
|--------------------------------------------------------------------------
| this will handle all restaurants part
*/
Route::get('/restaurants','restaurantsController@list')->name('admin.restaurants');
Route::get('/restaurant/info/{id}','restaurantsController@info')->name('admin.restaurant.info')->where('id', '[0-9]+');
Route::get('/restaurant/edit/{id}','restaurantsController@formEdit')->name('admin.restaurant.edit')->where('id', '[0-9]+')->middleware('role:restaurant,edit');
Route::post('/restaurant/edit/{id}','restaurantsController@submitEdit')->name('admin.restaurant.edit.submit')->where('id', '[0-9]+')->middleware('role:restaurant,edit');
Route::get('/restaurant/add','restaurantsController@formAdd')->name('admin.restaurant.add')->middleware('role:restaurant,add');
Route::post('/restaurant/add','restaurantsController@submitAdd')->name('admin.restaurant.add.submit')->middleware('role:restaurant,add');
Route::get('/restaurant/delete/{id}','restaurantsController@delete')->name('admin.restaurant.delete.submit')->middleware('role:restaurant,add');


#----------------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| appSetting Section
|--------------------------------------------------------------------------
| this will handle all appSetting part
*/
Route::get('/appSetting','appSettingController@formEdit')->name('appSetting');//->middleware('role:appSetting,edit');
Route::post('/appSetting/edit','appSettingController@submitEdit')->name('appSetting.edit');//->middleware('role:appSetting,edit');

 Route::get('/phone/edit/{id}','appSettingController@formEditPhone')->name('phone.edit');//->middleware('role:appSetting,edit');
Route::post('/phone/edit/{id}','appSettingController@submitEditPhone')->name('phone.edit.submit')->middleware('role:appSetting,edit');
Route::get('/phone/delete/{id}','appSettingController@deletePhone')->name('phone.delete');//->middleware('role:appSetting,edit');

Route::get('/phone/add','appSettingController@formAddPhone')->name('phone.add');//->middleware('role:appSetting,edit');
Route::post('/phone/add','appSettingController@submitAddPhone')->name('phone.add.submit');//->middleware('role:appSetting,edit');


Route::get('/email/edit/{id}','appSettingController@formEditEmail')->name('email.edit');//->middleware('role:appSetting,edit');
Route::post('/email/edit/{id}','appSettingController@submitEditEmail')->name('email.edit.submit')->middleware('role:appSetting,edit');
Route::get('/email/delete/{id}','appSettingController@deleteEmail')->name('email.delete');//->middleware('role:appSetting,edit');

Route::get('/email/add','appSettingController@formAddEmail')->name('email.add')->middleware('role:appSetting,edit');
Route::post('/email/add','appSettingController@submitAddEmail')->name('email.add.submit')->middleware('role:appSetting,edit');


#----------------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| User Section
|--------------------------------------------------------------------------
| this will handle all user part
*/
Route::get('/users','usersControllers@list')->name('users');
Route::get('/user/info/{id}','usersControllers@info')->name('user.info')->where('id', '[0-9]+');
Route::get('/user/status/{id}','usersControllers@status')->name('user.status')->where('id', '[0-9]+')->middleware('role:users,edit');
#----------------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
|  dashboard system
|--------------------------------------------------------------------------
|
| this will handle all   dashboard system
*/

Route::get('/home','dashBoardController@index')->name('dashboard');
Route::get('/dashboard','dashBoardController@index')->name('dashboard');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.admin');
});

Route::get('language/{lang}',function($lang){
    \Session::put('lang', $lang);
    \App::setLocale($lang);
  
    return redirect()->back();
});

Auth::routes(['register' => false, 'verify' => false]);





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@main')->name('main');
