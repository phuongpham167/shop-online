<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex(){
    	$slides = Slide::all();
    	// return view('page.trangchu', ['slide' => $slide]);
    	// print_r($slide);
    	$products = Product::all();
    	return view('page.trangchu', compact('slides', 'products'));
    }
    public function getChitiet(){
    	return view('page.chitiet_sanpham');
    }

    public function getLogin(){
    	return view('page.dangnhap');
    }

    public function getSignup(){
    	return view('page.dangki');
    }

    public function postSignup(Request $req){
    	$this->validate($req,
    		[
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:6|max:20',
    			'name' => 'required',
    			'password_cf' => 'required|same:password'
    		],
    		[
    			'email.required' => "Vui long nhap email",
    			'email.email' => 'Khong dung dinh dang email',
    			'email.unique' => 'Email da co tai khoan',
    			'password.required' => 'Vui long nhap mat khau',
    			'password.min' => 'Mat khau phai co it nhat 6 ki tu',
    			'password.max' => 'Mat khau co do dai lon nhat la 20',
    			'password_cf.required' => 'Vui long nhap lai mat khau',
    			'password_cf.same' => 'Mat khau khong khop'
    		]);
    	$user = New User();
    	$user->email = $req->email;
    	$user->name = $req->name;
    	$user->password = Hash::make($req->password);
    	$user->save();
    	return redirect()->back()->with('thanhcong', 'Da tao tai khoan thanh cong');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email' =>"required|email",
                'password' =>'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Email ban nhap khong dung dinh dang email',
                'password.required' => 'Vui long nhap mat khau',
                'password.min' => 'Mat khau phai co it nhat 6 ki tu',
                'password.max' => 'Mat khau khong duoc qua 20 ki tu'
            ]
            );
        $credentials = array('email' => $req->email, 'password' => $req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('index')->with(['flag' => 'success', 'message' => 'Dang nhap thanh cong']);
        }
        else{
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Dang nhap khong thanh cong']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }














}
