@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Thể loại <small>{{ $theloai->Ten }}</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Thể loại</li>
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
          <a href="{{ route('admin.theloai.danhsach') }}">Đây</a>
      </div>
      @endif
      {{-- Lỗi --}}
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa</h3>
    </div>
    <form role="form" action=""method="POST">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Sửa tên thể loại</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Thể loại" name="Ten" value="{{ $theloai->Ten }}">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
</div>
@endsection