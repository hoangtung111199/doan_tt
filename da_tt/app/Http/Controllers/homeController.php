<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Validations\Validation;
session_start();

class homeController extends Controller
{
    public function viewHome()
    {
    	$data = DB::table('tbl_tintuc')->where('loaiID','1')->get();	
    	$data2 = DB::table('tbl_tintuc')->where('loaiID','6312')->get();	
    	return view('users.home')->with('data',$data)->with('data2',$data2);
    }
    public function login()
    {
    	return view('users.login');
    }
    public function register()
    {
    	return view('users.register');
    }

    public function checkLogin(Request $re)
    {
    	if($re->userEmail==null||$re->userPass==null)
    	{
    		Session::forget('lg_err');
    		$messages = [
    			'userEmail.required'=>'Vui lòng điền thông tin email',
    			'userPass.required'=>'Vui lòng điền thông tin mật khẩu',
    		];

    		$this->validate($re,[
    			'userEmail'=>'required',
    			'userPass'=>'required',
    		],$messages);

    		$errors= $validate->errors();

    	}
    	else
    	{
    		$result = DB::table('tbl_user')->where('userEmail',$re->userEmail)->where('userPass',$re->userPass)->first();
    		if($result)
    		{
    			Session::forget('rg_sc');
    			Session::put('userEmail',$re->userEmail);
    			return redirect('/');
    		}
    		else
    		{
    			Session::put('lg_err','Tài khoản hoặc mật khẩu không chính xác!');
    			return redirect('/login');
    		}
    	}
    }
    public function logout()
    {
    	Session::forget('userEmail');
    	return redirect('/');
    }
     public function checkRegister(Request $re)
    {
    	if($re->userEmail==null||$re->userPass==null)
    	{
    		Session::forget('rg_sc');
    		Session::forget('lg_err');
    		$messages = [
    			'userEmail.required'=>'Vui lòng điền thông tin email',
    			'userPass.required'=>'Vui lòng điền thông tin mật khẩu',
    			'userTen.required'=>'Vui lòng điền tên của bạn',
    		];

    		$this->validate($re,[
    			'userEmail'=>'required',
    			'userPass'=>'required',
    			'userTen'=>'required',
    		],$messages);

    		$errors= $validate->errors();

    	}
    	else
    	{
    		$data=array();
    		$data['userID'] = rand(0,100).strlen($re->userEmail).strlen($re->userPass);
    		$data['userEmail']=$re->userEmail;
    		$data['userPass']=$re->userPass;
    		$data['userTen']=$re->userTen;
    		DB::table('tbl_user')->insert($data);
    		Session::put('rg_sc','Bạn đã đăng ký thành công');
    		return redirect('register');
    	}
    }
}
