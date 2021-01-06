@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tin tức <small>{{ $tintuc->TieuDe }}</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Tin tức</li>
          <li class="breadcrumb-item active">Sửa</li>
        </ol>
      </div>
    </div>
  </div>
</div>
      {{--  Lỗi --}}
      @if ($errors->any())
              @if (count($errors) > 0)
              <div class="alert alert-danger" role="alert">
                      @foreach ($errors->all() as $error)
                          {{ $error }}<br>
                      @endforeach          
              </div>
              @endif      
      @endif
      @if(session('thongbao'))
      <div class="alert alert-success" role="alert">
          {{ session('thongbao') }}
          <a href="{{ route('admin.tintuc.danhsach') }}">Đây</a>
      </div>
      @endif
      {{-- Lỗi --}}
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa tin tức</h3>
    </div>
    <form role="form" action="{{url('admin/tintuc/sua/'.$tintuc->id)}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tên thể loại</label>
          <select class="form-control" name ="TheLoai" id="TheLoai">
            @foreach($theloai as $tl)
            <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tên loại tin</label>
            <select class="form-control" name ="LoaiTin" id="LoaiTin">
              @foreach($loaitin as $lt)
              <option>
              </option>
              @endforeach
            </select>
          </div>
        <div class="form-group">
          <label>Tiêu đề</label>
          <input type="text" class="form-control" placeholder="Tiêu đề" name="TieuDe" value="{{ $tintuc->TieuDe }}">
        </div>
        <div class="form-group">
          <label>Tóm tắt</label>
          <input type="text" class="form-control" placeholder="Tóm tắt" name="TomTat" value="{{ $tintuc->TomTat }}">
        </div>
        <div class="form-group">
          <label>Hình ảnh</label>
          <img style="width: 50px;height:50px;" src="{{asset('upload/tintuc/'.$tintuc->Hinh)}}">
          <input type="file" name="Hinh" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Nổi bật</label>
          <select class="form-control" name ="NoiBat">
            <option value="1">Có</option>
            <option value="0">Không</option>
          </select>
        </div>
        <div class="form-group">
          <label>Nội dung</label>
          <textarea class="form-control" id="summary-ckeditor" name="NoiDung">{{ $tintuc->NoiDung }}</textarea>
          <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
          <script>
          CKEDITOR.replace( 'summary-ckeditor' );
          </script>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
</div>

@endsection

@section('script')
    <script>
          $(document).ready(function(){
            $("#TheLoai").change(function(){
              var idTheLoai = $(this).val();
               var url = "{{ url('admin/ajax/loaitin/') }}";
               $.get(url+'/'+idTheLoai,function(data){
                 $('#LoaiTin').html(data);
               });
            });
          });
    </script>
@endsection
