<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;
use App\TheLoai;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('database-user',function()
{
    Schema::create('users', function ($table) {
        $table->id();
        $table->string('name')->unique();
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->integer('level');
        $table->rememberToken();
        $table->timestamps();
    });
    echo "tạo thành công";
});
Route::get('admin',
[
    'as'=>'user',
    'uses' => 'Controller_Cua_Cuong@admin'
]);
Route::post('user',
[
    'as'=>'user',
    'uses' => 'Controller_Cua_Cuong@adminlogin'
]);
Route::get('adminlogout','Controller_Cua_Cuong@adminlogout')->name('adminlogout');
Route::post('userregister',
[
    'as'=>'userregister',
    'uses'=>'Controller_Cua_Cuong@userregister',
    
]);
Route::get('thu',function()
{
    return view('home.layout.index');
});

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function()
{
    Route::group(['prefix'=>'theloai'],function()
    {
        Route::get('danhsach','TheLoaiController@GetTheLoai')->name('admin.theloai.danhsach');

        Route::get('sua/{id}','TheLoaiController@GetSua')->name('admin.theloai.sua');
        Route::post('sua/{id}','TheLoaiController@PostSua')->name('admin.theloai.sua');
        
        Route::get('them','TheLoaiController@GetThem')->name('admin.theloai.them');
        Route::post('them','TheLoaiController@PostThem')->name('admin.theloai.them');

        Route::get('xoa/{id}','TheLoaiController@GetXoa')->name('admin.theloai.xoa');
    });
});
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function()
{
    Route::group(['prefix'=>'loaitin'],function()
    {
        Route::get('danhsach','LoaiTinController@GetLoaiTin')->name('admin.loaitin.danhsach');

        Route::get('sua/{id}','LoaiTinController@GetSua')->name('admin.loaitin.sua');
        Route::post('sua/{id}','LoaiTinController@PostSua')->name('admin.loaitin.sua');
        
        Route::get('them','LoaiTinController@GetThem')->name('admin.loaitin.them');
        Route::post('them','LoaiTinController@PostThem')->name('admin.loaitin.them');

        Route::get('xoa/{id}','LoaiTinController@GetXoa')->name('admin.loaitin.xoa');
    });
    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}','AjaxController@GetLoaiTin');
    });
});
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function()
{
    Route::group(['prefix'=>'tintuc'],function()
    {
        Route::get('danhsach','TinTucController@GetTinTuc')->name('admin.tintuc.danhsach');

        Route::get('sua/{id}','TinTucController@GetSua')->name('admin.tintuc.sua');
        Route::post('sua/{id}','TinTucController@PostSua')->name('admin.tintuc.sua');
        
        Route::get('comment/{id}','TinTucController@GetComment')->name('admin.tintuc.comment');
        Route::get('commentxoa/{id}/{idTinTuc}','TinTucController@CommentXoa');

        Route::get('them','TinTucController@GetThem')->name('admin.tintuc.them');
        Route::post('them','TinTucController@PostThem')->name('admin.tintuc.them');

        Route::get('xoa/{id}','TinTucController@GetXoa')->name('admin.tintuc.xoa');
    });
});
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function()
{
    Route::group(['prefix'=>'slide'],function()
    {
        Route::get('danhsach','SlideController@GetSlide')->name('admin.slide.danhsach');

        Route::get('sua/{id}','SlideController@GetSua')->name('admin.slide.sua');
        Route::post('sua/{id}','SlideController@PostSua')->name('admin.slide.sua');
        
        Route::get('them','SlideController@GetThem')->name('admin.slide.them');
        Route::post('them','SlideController@PostThem')->name('admin.slide.them');

        Route::get('xoa/{id}','SlideController@GetXoa')->name('admin.slide.xoa');
    });

});
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function()
{
    Route::group(['prefix'=>'user'],function()
    {
        Route::get('danhsach','UserController@GetUser')->name('admin.user.danhsach');

        Route::get('sua/{id}','UserController@GetSua')->name('admin.user.sua');
        Route::post('sua/{id}','UserController@PostSua')->name('admin.user.sua');
        
        Route::get('them','UserController@GetThem')->name('admin.user.them');
        Route::post('them','UserController@PostThem')->name('admin.user.them');

        Route::get('xoa/{id}','UserController@GetXoa')->name('admin.user.xoa');
    });

});
Route::get('home','PageController@GetTrangChu')->name('home');
Route::get('loaitin/{id}','PageController@GetLoaiTin');
Route::get('tintuc/{id}','PageController@GetTinTuc');
Route::post('comment/{id}','PageController@PostComment');