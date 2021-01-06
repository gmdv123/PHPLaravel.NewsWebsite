<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function GetUser()
    {   
        $user = User::paginate(10);
        return view('admin.user.danhsach',['user'=>$user]);
    }
    public function GetThem()
    {   
        return view('admin.user.them');
    }
    public function PostThem(Request $request)
    {
        $this->validate($request,
        [
           'name' => 'required|min:6|max:32|unique:users,name',
           'password' =>'required|min:6|max:32',
           'email' => 'required|email|unique:users,email',
           'password_confirmation' =>'required|same:password'
           
        ],
        [
            'name.required' => 'Yêu cầu nhập tên đăng nhập.',
            'name.min' =>'Tên đăng nhập tối thiểu 6 kí tự.',
            'name.max' =>'Tên đăng nhập tối đa 32 kí tự.',
            'name.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required' => 'Yêu cầu nhập mật khẩu.',
            'password.min' =>'Mật khẩu tối thiểu 6 kí tự.',
            'password.max' =>'Mật khẩu tối đa 32 kí tự.',
            'email.required' => 'Yêu cầu nhập email.',
            'email.unique' =>'Email đã tồn tại.',
            'email.email' => 'Sai định dạng email.',
            'password_confirmation.required' =>'Yêu cầu nhập mật khẩu xác nhận',
            'password_confirmation.same' =>'Yêu cầu nhập đúng mật khẩu xác nhận',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetSua($id)
    {   
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function PostSua(Request $request,$id)
    {
        $this->validate($request,
        [
           'name' => 'required|min:6|max:32',
           'password' =>'required|min:6|max:32',
           'email' => 'required|email',
           'password_confirmation' =>'required|same:password'
           
        ],
        [
            'name.required' => 'Yêu cầu nhập tên đăng nhập.',
            'name.min' =>'Tên đăng nhập tối thiểu 6 kí tự.',
            'name.max' =>'Tên đăng nhập tối đa 32 kí tự.',
            'password.required' => 'Yêu cầu nhập mật khẩu.',
            'password.min' =>'Mật khẩu tối thiểu 6 kí tự.',
            'password.max' =>'Mật khẩu tối đa 32 kí tự.',
            'email.required' => 'Yêu cầu nhập email.',
            'email.email' => 'Sai định dạng email.',
            'password_confirmation.required' =>'Yêu cầu nhập mật khẩu xác nhận',
            'password_confirmation.same' =>'Yêu cầu nhập đúng mật khẩu xác nhận',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Sửa thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetXoa($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect('admin/user/danhsach/')->with('xoa','Xóa thành công !');
    }
}
