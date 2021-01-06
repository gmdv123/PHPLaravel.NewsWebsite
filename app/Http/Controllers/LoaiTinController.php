<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiTinController extends Controller
{
    public function GetLoaiTin()
    {   

        $theloai = TheLoai::all();
        $loaitin = LoaiTin::paginate(10);
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function GetThem()
    {   
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);

    }
    public function PostThem(Request $request)
    {
        $this->validate($request,
        [
           'Ten' => 'required|min:3|max:64',
           
        ],
        [   
            'Ten.required' => 'Yêu cầu nhập tên thể loại.',
            'Ten.min'=>'Tối thiếu 3 kí tự.',
            'Ten.max'=>'Tối đa 64 kí tự.',
        ]);
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request -> Ten;
        $loaitin->TenKhongDau = Str::slug($request->Ten , '-');
        $loaitin->idTheLoai=$request-> ChonTL;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetSua($id)
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view ('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function PostSua(Request $request,$id)
    {
        $loaitin = LoaiTin::find($id);
        $this->validate($request,
        [
           'Ten' => 'required|min:3|max:64|unique:loaitin',
           
        ],
        [   
            'Ten.unique'=>'Tên loại tin đã tồn tại',
            'Ten.required'=>'Yêu cầu nhập tên loại tin.',
            'Ten.min'=>'Tối thiếu 3 kí tự.',
            'Ten.max'=>'Tối đa 64 kí tự.',
        ]);
        $loaitin->Ten = $request -> Ten;
        $loaitin->TenKhongDau = Str::slug($request->Ten , '-');
        $loaitin->idTheLoai = $request -> ChonTL;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công ! bấm vào đây để trở về danh sách.');      
    }
    public function GetXoa($id)
    {
        $loaitin =Loaitin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('xoa','Xóa thành công.'); 
    }
}
