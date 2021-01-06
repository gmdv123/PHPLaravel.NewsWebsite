<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TheLoai;
use App\Slide;
use App\TinTuc;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller_Cua_Cuong extends Controller
{   
    public function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        $tintuc = TinTuc::orderBy('id','DESC')->paginate(6);
        $tinnoibat = TinTuc::where('NoiBat',1)->orderBy('id','DESC')->take(3)->get();

        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
        view()->share('tintuc',$tintuc);
        view()->share('tinnoibat',$tinnoibat);
    }
    public function adminlogin(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];
        
        if (Auth::attempt(['name'=>$username,'password'=>$password,'level'=>1]))
            return view('admin.layout.admin',['user=>Auth::(user)']);
        if (Auth::attempt(['name'=>$username,'password'=>$password,'level'=>0]))
            return view('pages.home',['user=>Auth::(user)']);
        else
            echo "<script>";
            echo "alert('Sai tài khoản hoặc mật khẩu , vui lòng điền lại');";
            echo 'window.location.href = "home";';
            echo "</script>";      
    }
    public function adminlogout()
    {
        Auth::logout();
        return redirect('home');
    }
    public function userregister(Request $request)
    {   
        $this->validate($request,
        [
           'name' => 'required|min:6|max:32|unique:users,name',
           'password' =>'required|min:6|max:32',
           'password_confirmation' =>'required|same:password',
           'email' => 'required|email|unique:users,email',
        ],
        [
            'name.required' => 'Yêu cầu nhập tên đăng nhập.',
            'name.min' =>'Tên đăng nhập tối thiểu 6 kí tự.',
            'name.max' =>'Tên đăng nhập tối đa 32 kí tự.',
            'password.required' => 'Yêu cầu nhập mật khẩu.',
            'password.min' =>'Mật khẩu tối thiểu 6 kí tự.',
            'password.max' =>'Mật khẩu tối đa 32 kí tự.',
            'password_confirmation.required' =>'Yêu cầu nhập mật khẩu xác nhận.',
            'password_confirmation.same' =>'Yêu cầu nhập đúng mật khẩu xác nhận.',
            'email.required' => 'Yêu cầu nhập email.',
            'email.unique' =>'Email đã tồn tại.',
            'email.email' => 'Sai định dạng email.',
        ]);
        $user = new User;
        $user->name = $request -> name;
        $user->email =$request -> email;
        $user->password = bcrypt($request->password);
        $user->level='0';
        $user->save();
            echo "<script>";
            echo "alert('Đăng kí thành công.');";
            echo 'window.location.href = "home";';
            echo "</script>";    
    }
}
