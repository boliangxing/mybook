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
Route::any('service/cart/add/{product_id}', 'Service\CartController@addCart');

Route::any('service/validate_code/create', 'Service\ValidateController@create');
Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');
Route::any('service/validate_email', 'Service\ValidateController@validateEmail');
Route::post('service/register', 'Service\MemberController@register');
  Route::post('service/login','Service\MemberController@login');
Route::get('service/category/paraent_id/{paraent_id}', 'Service\BookController@getCategoryByParentId');
