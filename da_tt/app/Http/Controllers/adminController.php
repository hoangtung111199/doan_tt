<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Validations\Validation;
session_start();
class adminController extends Controller
{
    public function viewAdmin()
    {
    	if(Session::has('adTen')!=null)
    	{

    		return view('admin.index');
    	}
    	else
    	{
    		return view('admin.login');
    	}
    }
     public function viewNhanvien()
    {
        if(Session::has('adTen')!=null)
        {
            $data = DB::table('tbl_admin')->get();
            return view('admin.admin')->with('data',$data);
        }
        else
        {
            return view('admin.login');
        }
    }
     public function viewKhachhang()
    {
        if(Session::has('adTen')!=null)
        {
            $data = DB::table('tbl_user')->get();
            return view('admin.user')->with('data',$data);
        }
        else
        {
            return view('admin.login');
        }
    }
    public function viewTintuc()
    {
    	if(Session::has('adTen')!=null)
    	{
    		$data = DB::table('tbl_tintuc')->get();
    		
    		return view('admin.tintuc')->with('data',$data);
    	}
    	else
    	{
    		return view('admin.login');
    	}
    }
     public function viewLoai()
    {
    	if(Session::has('adTen')!=null)
    	{
    		$data = DB::table('tbl_loai')->get();
    		
    		return view('admin.loai')->with('data',$data);
    	}
    	else
    	{
    		return view('admin.login');
    	}
    }
    public function viewLogin()
    {
    	
    	return view('admin.login');
    }

    public function adCheckLogin(Request $re)
    {
    	if($re->adAcc==null||$re->adPass==null)
    	{
    		Session::forget('lg_err');
    		$messages = [
    			'adAcc.required'=>'Vui lòng điền thông tin tài khoản',
    			'adPass.required'=>'Vui lòng điền thông tin mật khẩu',
    		];

    		$this->validate($re,[
    			'adAcc'=>'required',
    			'adPass'=>'required',
    		],$messages);

    		$errors= $validate->errors();

    	}
    	else
    	{
    		$result = DB::table('tbl_admin')->where('adAcc',$re->adAcc)->where('adPass',$re->adPass)->first();
    		if($result)
    		{
    			$db=DB::table('tbl_admin')->select('adTen')->where('adAcc',$re->adAcc)->get();
    			Session::put('adTen',$db);
    			return view('admin.index');
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
    	Session::forget('adTen');
    	Session::forget('lg_err');

    	 return redirect('admin');
    }

    public function viewThemtt()
    {
    	$loai = DB::table('tbl_loai')->get();
    	return view('admin.themtintuc')->with('loai',$loai);
    }
    public function checkThemtt(Request $re)
    {
    	if($re->ttTieude==null||$re->ttNoidung==null||$re->ttNgayviet==null)
    	{
    		Session::forget('lg_err');
    		$messages = [
    			'ttTieude.required'=>'Vui lòng điền tiêu đề',
    			'ttNoidung.required'=>'Vui lòng điền nội dung',
    			'ttNgayviet.required'=>'Vui lòng điền nội dung',

    		];

    		$this->validate($re,[
    			'ttTieude'=>'required',
    			'ttNoidung'=>'required',
    			'ttNgayviet'=>'required',
    		],$messages);

    		$errors= $validate->errors();
    	}
    	else
    	{
    		if($re->hasFile('ttHinh')==true)
    		{
    			$data = array();
    			$data['ttID'] = rand(0,100).strlen($re->ttNoidung);
    			$data['ttTieude']=$re->ttTieude;
    			$data['ttNoidung']=$re->ttNoidung;
    			$data['ttHinh'] = $re->file('ttHinh')->getClientOriginalName();
    					$imgextension= $re->file('ttHinh')->extension();
    					$file = $re->file('ttHinh');
    					$file->move('public/imgs',$data['ttHinh']);
    			$data['ttNgayviet']=$re->ttNgayviet;
    			$data['loaiID']=$re->loaiMa;
    			Session::forget('img_err');
    			DB::table('tbl_tintuc')->insert($data);
    			return redirect('tintuc');
    		}
    		else
    		{

    			Session::put('img_err','Vui lòng thêm hình ảnh cho tin tức!');
    			return redirect('themtintuc');
    		}
    	}
    }
    public function adDeletett($id)
    {
    	DB::table('tbl_tintuc')->where('ttID',$id)->delete();
    	return redirect('tintuc');
    }
     public function viewSuatt($id)
    {
    	$ttID=DB::table('tbl_tintuc')->where('ttID',$id)->first();
        $loaiOld = DB::table('tbl_loai')->where('loaiID',$ttID->loaiID)->get();
        $db = DB::table('tbl_tintuc')->where('ttID',$id)->get();
    	return view('admin.suatintuc')->with('db',$db)->with('loaiOld',$loaiOld);
    }
    public function Suatt(Request $re, $id)
    {
    		if($re->ttTieude==null||$re->ttNoidung==null||$re->ttNgayviet==null)
    	{
    		
    		$messages = [
    			'ttTieude.required'=>'Vui lòng điền tiêu đề',
    			'ttNoidung.required'=>'Vui lòng điền nội dung',
    			'ttNgayviet.required'=>'Vui lòng điền nội dung',

    		];

    		$this->validate($re,[
    			'ttTieude'=>'required',
    			'ttNoidung'=>'required',
    			'ttNgayviet'=>'required',
    		],$messages);

    		$errors= $validate->errors();
    	}
    	else
    	{
    		if($re->hasFile('ttHinh')==true)
    		{
    			$data = array();
    			$data['ttID'] = rand(0,100).strlen($re->ttNoidung);
    			$data['ttTieude']=$re->ttTieude;
    			$data['ttNoidung']=$re->ttNoidung;
    			$data['ttHinh'] = $re->file('ttHinh')->getClientOriginalName();
    					$imgextension= $re->file('ttHinh')->extension();
    					$file = $re->file('ttHinh');
    					$file->move('public/imgs',$data['ttHinh']);
    			$data['ttNgayviet']=$re->ttNgayviet;
    			$data['loaiID']=$re->loaiMa;
    			
    			DB::table('tbl_tintuc')->where('ttID',$id)->update($data);
    			return redirect('tintuc');
    		}
    		else
    		{
				$data = array();
    			$data['ttID'] = rand(0,100).strlen($re->ttNoidung);
    			$data['ttTieude']=$re->ttTieude;
    			$data['ttNoidung']=$re->ttNoidung;
    			$data['ttNgayviet']=$re->ttNgayviet;
    			$data['loaiID']=$re->loaiMa;
    			
    			DB::table('tbl_tintuc')->where('ttID',$id)->update($data);
    			return redirect('tintuc');
    		}
    	}
    }
    //Loại
     public function viewThemLoai()
    {
    	return view('admin.themloai');
    }
    public function adCheckThemLoai(Request $re)
    {
    	if($re->loaiTen==null)
    	{
    		$messages = [
    			'loaiTen.required'=>'Vui lòng điền tên loại',
    		];

    		$this->validate($re,[
    			'loaiTen'=>'required',
    		],$messages);

    		$errors= $validate->errors();
    	}
    	else
    	{
    			$data = array();
    			$data['loaiID'] = rand(0,100).strlen($re->loaiTen);
    			$data['loaiTen']=$re->loaiTen;
    			
    			DB::table('tbl_loai')->insert($data);
    			return redirect('loai');
    		
    	}
    }
    public function adDeleteLoai($id)
    {
    	DB::table('tbl_loai')->where('loaiID',$id)->delete();
    	return redirect('loai');
    }
     public function viewSuaLoai($id)
    {
        $loaiOld = DB::table('tbl_loai')->where('loaiID',$id)->get();
    	return view('admin.sualoai')->with('loaiOld',$loaiOld);
    }
    public function adSuaLoai(Request $re, $id)
    {
    	if($re->loaiTen==null)
    	{
    		
    		$messages = [
    			'loaiTen.required'=>'Vui lòng điền tên loại',
    		];

    		$this->validate($re,[
    			'loaiTen'=>'required',
    			
    		],$messages);

    		$errors= $validate->errors();
    	}
    	else
    	{
    		
    			$data = array();
    			$data['loaiID'] =$id;
    			$data['loaiten']=$re->loaiTen;
    			
    			DB::table('tbl_loai')->where('loaiID',$id)->update($data);
    			return redirect('loai');
    		
    	}
    }
    //Khách hàng
     public function viewThemkh()
    {
        return view('admin.themuser');
    }
    public function checkThemkh(Request $re)
    {
       if($re->userEmail==null||$re->userPass==null)
        {
           
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
            
            return redirect('user');
        }

    }
    public function adDeletekh($id)
    {
        DB::table('tbl_user')->where('userID',$id)->delete();
        return redirect('user');
    }
     public function viewSuakh($id)
    {
        $db = DB::table('tbl_user')->where('userID',$id)->get();
        return view('admin.suauser')->with('db',$db);
    }
    public function Suakh(Request $re, $id)
    {
        if($re->userEmail==null||$re->userPass==null||$re->userTen==null)
        {
           
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
            $data['userID'] = $id;
            $data['userEmail']=$re->userEmail;
            $data['userPass']=$re->userPass;
            $data['userTen']=$re->userTen;
            DB::table('tbl_user')->where('userID',$id)->update($data);
            
            return redirect('user');
        }
    }
    //Nhân viên
      public function viewThemad()
    {
        return view('admin.themadmin');
    }
    public function checkThemad(Request $re)
    {
       if($re->adAcc==null||$re->adPass==null)
        {
           
            Session::forget('lg_err');
            $messages = [
                'adAcc.required'=>'Vui lòng điền thông tin tài khoản',
                'adPass.required'=>'Vui lòng điền thông tin mật adẩu',
                'adTen.required'=>'Vui lòng điền tên của bạn',
            ];

            $this->validate($re,[
                'adAcc'=>'required',
                'adPass'=>'required',
                'adTen'=>'required',
            ],$messages);

            $errors= $validate->errors();

        }
        else
        {
            $data=array();
            $data['adID'] = rand(0,100).strlen($re->adAcc).strlen($re->adPass);
            $data['adAcc']=$re->adAcc;
            $data['adPass']=$re->adPass;
            $data['adTen']=$re->adTen;
            DB::table('tbl_admin')->insert($data);
            
            return redirect('nhanvien');
        }

    }
    public function adDeletead($id)
    {
        DB::table('tbl_admin')->where('adID',$id)->delete();
        return redirect('nhanvien');
    }
     public function viewSuaad($id)
    {
        $db = DB::table('tbl_admin')->where('adID',$id)->get();
        return view('admin.suaadmin')->with('db',$db);
    }
    public function Suaad(Request $re, $id)
    {
        if($re->adAcc==null||$re->adPass==null||$re->adTen==null)
        {
           
            Session::forget('lg_err');
            $messages = [
                'adAcc.required'=>'Vui lòng điền thông tin tài khảon',
                'adPass.required'=>'Vui lòng điền thông tin mật adẩu',
                'adTen.required'=>'Vui lòng điền tên của bạn',
            ];

            $this->validate($re,[
                'adAcc'=>'required',
                'adPass'=>'required',
                'adTen'=>'required',
            ],$messages);

            $errors= $validate->errors();

        }
        else
        {
            $data=array();
            $data['adID'] = $id;
            $data['adAcc']=$re->adAcc;
            $data['adPass']=$re->adPass;
            $data['adTen']=$re->adTen;
            DB::table('tbl_admin')->where('adID',$id)->update($data);
            
            return redirect('nhanvien');
        }
    }
}
