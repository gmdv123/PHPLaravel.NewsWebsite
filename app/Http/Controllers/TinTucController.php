<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    public function GetTinTuc()
    {   
        $tintuc = TinTuc::orderBy('id','DESC')->paginate(10);
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function GetThem()
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);

    }
    public function PostThem(Request $request)
    {
        $this->validate($request,
        [
           'LoaiTin'=>'required',
           'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
           'TomTat'=>'required',
           'NoiDung'=>'required',
        ],
        [   
            'LoaiTin.required'=>'Chưa chọn loại tin.',
            'TieuDe.required'=>'Chưa điền tiêu đề.',
            'TieuDe.min'=>'Tiêu đề ít nhất 3 kí tự.',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại.',
            'TomTat.required'=>'Chưa điền tóm tắt.',
            'NoiDung.required'=>'Chưa điền nội dung.',
        ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau=Str::slug($request->TieuDe , '-');
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->NoiBat=$request->NoiBat;
        $tintuc->SoLuotXem = 0;

        if($request ->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $extention = $file->getClientOriginalExtension();
            if ($extention != 'jpg' && $extention != 'png'&& $extention != 'JPG'&& $extention != 'PNG')
            {
                return redirect('admin/tintuc/them')->with('loi','Chỉ nhận file hình ảnh có đuôi png,jpg.');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else 
        {
            $tintuc->Hinh ="";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetSua($id)
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view ('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function PostSua(Request $request,$id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
           'LoaiTin'=>'required',
           'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
           'TomTat'=>'required',
           'NoiDung'=>'required',
        ],
        [   
            'LoaiTin.required'=>'Chưa chọn loại tin.',
            'TieuDe.required'=>'Chưa điền tiêu đề.',
            'TieuDe.min'=>'Tiêu đề ít nhất 3 kí tự.',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại.',
            'TomTat.required'=>'Chưa điền tóm tắt.',
            'NoiDung.required'=>'Chưa điền nội dung.',
        ]);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau=Str::slug($request->TieuDe , '-');
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->NoiBat=$request->NoiBat;

        if($request ->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $extention = $file->getClientOriginalExtension();
            if ($extention != 'jpg' && $extention != 'png'&& $extention != 'JPG'&& $extention != 'PNG')
            {
                return redirect('admin/tintuc/them')->with('loi','Chỉ nhận file hình ảnh có đuôi png,jpg.');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            unlink("upload/tintuc/".$tintuc->Hinh);
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetXoa($id)
    {
        $tintuc =TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('xoa','Xóa thành công.'); 
    }
    public function GetComment($id)
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        $comment = Comment::orderBy('id','DESC')->paginate(10);
        return view ('admin.tintuc.comment',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin,'comment'=>$comment]);
    }
    public function CommentXoa($id,$idTinTuc)
    {   
        $comment = Comment::find($id);
        $comment ->delete();
        return redirect('admin/tintuc/comment/'.$idTinTuc)->with('xoa','Xóa thành công !');
    }
}
