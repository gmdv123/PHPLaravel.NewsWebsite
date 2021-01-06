<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slide;

class SlideController extends Controller
{
    public function GetSlide()
    {   
        $slide = Slide::orderBy('id','DESC')->paginate(10);
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function GetThem()
    {   
        return view ('admin.slide.them');
    }
    public function PostThem(Request $request)
    {
        $this->validate($request,
        [
           'Ten' => 'required',
           'NoiDung' =>'required',
           'Hinh' =>'required',
        ],
        [   
            'Ten.required' => 'Yêu cầu nhập tên slide.',
            'NoiDung.required' =>'Yêu cầu nhập tên slide.',
            'Hinh.required' =>'Yêu cầu thêm hình.',
        ]);
        $slide = new Slide;
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        $slide->link = $request->Link;
        if($request ->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $extention = $file->getClientOriginalExtension();
            if ($extention != 'jpg' && $extention != 'png'&& $extention != 'JPG'&& $extention != 'PNG')
            {
                return redirect('admin/slide/them')->with('loi','Chỉ nhận file hình ảnh có đuôi png,jpg.');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/slide/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$Hinh);
            $slide->Hinh = $Hinh;
        }
        else 
        {
            $slide->Hinh ="";
        }  
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetSua($id)
    {   
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function PostSua(Request $request,$id)
    {
        $this->validate($request,
        [
           'Ten' => 'required',
           'NoiDung' =>'required',
           'Link'=>'required,'
        ],
        [   
            'Ten.required' => 'Yêu cầu nhập tên slide.',
            'NoiDung.required' =>'Yêu cầu nhập tên slide.',
            'Link.required' => 'Yêu cầu nhập đường dẫn.',
        ]);
        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        $slide->link = $request->Link;
        if($request ->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $extention = $file->getClientOriginalExtension();
            if ($extention != 'jpg' && $extention != 'png'&& $extention != 'JPG'&& $extention != 'PNG')
            {
                return redirect('admin/slide/them')->with('loi','Chỉ nhận file hình ảnh có đuôi png,jpg.');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while(file_exists("upload/slide/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$Hinh);
            $slide->Hinh = $Hinh;
        }
        else 
        {
            $slide->Hinh ="";
        }  
        $slide->save();
        return redirect('admin/slide/sua/'.$slide->id)->with('thongbao','Sửa thành công ! bấm vào đây để trở về danh sách.');
    }
    public function GetXoa($id)
    {
        $slide =Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('xoa','Xóa thành công.');
    }
}
