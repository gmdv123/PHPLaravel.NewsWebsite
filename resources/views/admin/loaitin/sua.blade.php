@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Loại tin <small>{{ $loaitin->Ten }}</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Loại tin</li>
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
          <a href="{{ route('admin.loaitin.danhsach') }}">Đây</a>
      </div>
      @endif
      {{-- Lỗi --}}
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa loại tin</h3>
    </div>
    <form role="form" action="{{url('admin/theloai/sua/'.$loaitin->id)}}" method="POST">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tên thể loại</label>
          <select class="form-control" id="exampleFormControlSelect1" name ="ChonTL">
            @foreach($theloai as $tl)
            <option             
              @if($loaitin->idTheLoai==$tl->id)
                {{ 'selected' }}
              @endif
             value="{{ $tl->id }}">{{ $tl->Ten }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tên loại tin</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập loại tin" name="Ten" value="{{ $loaitin->Ten }}">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
</div>
@endsection