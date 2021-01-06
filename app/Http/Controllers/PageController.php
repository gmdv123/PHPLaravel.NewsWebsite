<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{      
    function __construct()
    {
        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }

    }
    function GetTrangChu()
    {      
        $tintuc = TinTuc::orderBy('id','DESC')->paginate(6);
        $tinnoibat = TinTuc::where('NoiBat',1)->orderBy('id','DESC')->take(3)->get();
        $slide = Slide::all();
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('pages.home',['theloai'=>$theloai,'slide'=>$slide,'tintuc'=>$tintuc,'loaitin'=>$loaitin,'tinnoibat'=>$tinnoibat]);
    }
    function GetLoaiTin($id)
    {   
        $theloai = TheLoai::all();
        $tintuc = TinTuc::orderBy('id','DESC')->where('idLoaiTin',$id)->paginate(5);
        $loaitin = LoaiTin::find($id);
        return view('pages.loaitin',['theloai'=>$theloai,'tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }
    function GetTinTuc($id)
    {   
        $theloai = TheLoai::all();
        $tinnoibat = TinTuc::where('NoiBat',1)->orderBy('id','DESC')->take(2)->get();
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(2)->get();
        return view('pages.tintuc',['tinnoibat'=>$tinnoibat,'tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan,'theloai'=>$theloai]);
    }
    function PostComment($id,Request $request)
    {
        $idTinTuc = $id;
        $comment = new Comment();
        $comment->idTinTuc = $idTinTuc;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request ->NoiDungComment;
        $comment->save();
        return redirect("tintuc/$id");
    }
}
