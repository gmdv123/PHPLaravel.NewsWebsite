<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TheLoaiController extends Controller
{
    public function GetTheLoai()
    {   
        $theloai = TheLoai::paginate(10);
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function GetThem()
    {   
        return view('admin.theloai.them');
    }
    public function PostThem(Request $request)
    {
        $this->validate($request,
        [
           'Ten' => 'required|min:3|max:64|unique:theloai',
           
        ],
        [   
            'Ten.unique' =>'Tên thể loại đã tồn tại',
            'Ten.required' => 'Yêu cầu nhập tên thể loại.',
            'Ten.min'=>'Tối thiếu 3 kí tự.',
            'Ten.max'=>'Tối đa 64 kí tự.',
        ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request -> Ten;
        $theloai->TenKhongDau = Str::slug($request->Ten , '-');
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetSua($id)
    {
        $theloai = TheLoai::find($id);
        return view ('admin.theloai.sua')->with('theloai', $theloai);
    }
    public function PostSua(Request $request,$id)
    {
        $theloai = TheLoai::find($id);
        $this->validate($request,
        [
           'Ten' => 'required|min:3|max:64|unique:theloai'
           
        ],
        [   
            'Ten.unique' =>'Tên thể loại đã tồn tại',
            'Ten.required' => 'Yêu cầu nhập tên thể loại.',
            'Ten.min'=>'Tối thiếu 3 kí tự.',
            'Ten.max'=>'Tối đa 64 kí tự.',
        ]);
        $theloai->Ten = $request -> Ten;
        $theloai->TenKhongDau = Str::slug($request->Ten , '-');
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công ! bấm vào đây để trở về danh sách.'); 
    }
    public function GetXoa($id)
    {
        $theloai =TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('xoa','Xóa thành công.');
    }
}
