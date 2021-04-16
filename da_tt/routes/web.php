<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','homeController@viewHome');
Route::get('/admin','adminController@viewAdmin');

//--admin--//
Route::get('/nhanvien','adminController@viewNhanvien');
Route::get('/user','adminController@viewKhachhang');
Route::get('/tintuc','adminController@viewTintuc');
Route::get('/loai','adminController@viewLoai');
Route::get('login','adminController@viewlogin');
Route::get('/checkLogin','adminController@adCheckLogin');
Route::get('logout','adminController@logout');



//--Nhân viêng--//
Route::get('themad','adminController@viewThemad');
Route::post('/checkThemad','adminController@checkThemad');
Route::get('/xoaad/{id}','adminController@adDeletead');
Route::get('/suaad/{id}','adminController@viewSuaad');
Route::post('/editad/{id}','adminController@Suaad');
//--khách hàng--//
Route::get('themuser','adminController@viewThemkh');
Route::post('/checkThemkh','adminController@checkThemkh');
Route::get('/xoauser/{id}','adminController@adDeletekh');
Route::get('/suauser/{id}','adminController@viewSuakh');
Route::post('/editKH/{id}','adminController@Suakh');
//--tintuc--//
Route::get('themtintuc','adminController@viewThemtt');
Route::post('/checkThemtt','adminController@checkThemtt');
Route::get('/xoatintuc/{id}','adminController@adDeletett');
Route::get('/suatintuc/{id}','adminController@viewSuatt');
Route::post('/editTT/{id}','adminController@Suatt');
//--loại--//
Route::get('themloai','adminController@viewThemLoai');
Route::get('/checkThemloai','adminController@adCheckThemLoai');
Route::get('/xoaloai/{id}','adminController@adDeleteLoai');
Route::get('/sualoai/{id}','adminController@viewSuaLoai');
Route::get('/editLoai/{id}','adminController@adSualoai');

//--User--//
Route::get('loginkh','homeController@login');
Route::get('register','homeController@register');
Route::get('logoutkh','homeController@logout');

Route::get('checkLoginUser','homeController@checkLogin');
Route::get('checkRegister','homeController@checkRegister');