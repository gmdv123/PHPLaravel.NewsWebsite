@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Slide</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Slide</li>
          <li class="breadcrumb-item active">Thêm</li>
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
          <a href="{{ route('admin.slide.danhsach') }}">Đây</a>
      </div>
      @endif
      {{-- Lỗi --}}
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm slide</h3>
    </div>
    <form role="form" action="{{ route('admin.slide.them') }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Tên Slide</label>
          <input type="text" class="form-control" placeholder="Tên" name="Ten">
        </div>
        <div class="form-group">
          <label>Nội Dung</label>
          <input type="text" class="form-control" placeholder="Nội Dung" name="NoiDung">
        </div>
        <div class="form-group">
          <label>Hình ảnh</label>
          <input type="file" name="Hinh" class="form-control">
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control" placeholder="Link" name="Link">
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
</div>
@endsection