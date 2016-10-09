<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Entity\Member;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', 'View\MemberController@toLogin');

Route::get('/register', 'View\MemberController@toRegister');
Route::get('/category', 'View\BookController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\BookController@toProduct');

Route::get('/product/{product_id}', 'View\BookController@toPdtContent');
//中间件
Route::get('/cart','View\CartController@toCart');
Route::get('/alipay', function(){

return view('alipay');

});


Route::get('/order_commit/{product_ids}','View\OrderController@toOrderCommit')->middleware(['middleware'=>'check.login']);
Route::get('/order_list','View\OrderController@toOrderList')->middleware(['middleware'=>'check.login']);
Route::group(['prefix'=>'service'],function(){

  Route::any('cart/add/{product_id}', 'Service\CartController@addCart');
  Route::any('cart/delete', 'Service\CartController@deleteCart');
  Route::any('pay', 'Service\PayController@alipay');

  Route::any('validate_code/create', 'Service\ValidateController@create');
  Route::any('validate_phone/send', 'Service\ValidateController@sendSMS');
  Route::any('validate_email', 'Service\ValidateController@validateEmail');
  Route::post('register', 'Service\MemberController@register');
    Route::post('login','Service\MemberController@login');
  Route::get('category/paraent_id/{paraent_id}', 'Service\BookController@getCategoryByParentId');


});

Route::group(['prefix'=>'ad'],function(){

   Route::group(['prefix' => 'service'], function () {
     Route::post('category/add','Ad\CategoryController@categoryadd');
     Route::post('category/del','Ad\CategoryController@categorydel');
     Route::post('category/edit','Ad\CategoryController@categoryedit');
     Route::post('product/del', 'Ad\ProductController@productDel');
     Route::post('product/edit', 'Ad\ProductController@productEdit');
     Route::post('member/edit', 'Ad\MemberController@memberEdit');
     Route::post('order/edit', 'Ad\OrderController@orderEdit');
   });

   Route::post('product/add', 'Ad\ProductController@productAdd');

       Route::get('product', 'Ad\ProductController@toProduct');
       Route::get('product_info', 'Ad\ProductController@toProductInfo');
       Route::get('product_add', 'Ad\ProductController@toProductAdd');
       Route::get('product_edit', 'Ad\ProductController@toProductEdit');
       Route::get('member', 'Ad\MemberController@toMember');
       Route::get('member_edit', 'Ad\MemberController@toMemberEdit');
       Route::get('Order', 'Ad\OrderController@toOrder');
       Route::get('order_edit', 'Ad\OrderController@toOrderEdit');
  Route::get('/index','Ad\IndexController@toIndex');
    Route::get('/login','Ad\IndexController@toLogin');
      Route::get('/category','Ad\CategoryController@toCategory');
      Route::get('/category_add','Ad\CategoryController@toCategoryAdd');
      Route::get('/category_edit','Ad\CategoryController@toCategoryEdit');


});
