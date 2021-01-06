@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Thể loại</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Thể loại</li>
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
                          {{ $error }}
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
      <h3 class="card-title">Thêm thể loại</h3>
    </div>
    <form role="form" action="{{ route('admin.theloai.them') }}" method="POST">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Tên thể loại</label>
          <input type="text" class="form-control" placeholder="Thể loại" name="Ten">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>

    </form>
    
</div>
@endsection