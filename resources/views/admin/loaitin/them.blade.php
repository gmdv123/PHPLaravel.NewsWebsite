@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Loại tin</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Loại tin</li>
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
          <a href="{{ route('admin.loaitin.danhsach') }}">Đây</a>
      </div>
      @endif
      {{-- Lỗi --}}
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm loại tin</h3>
    </div>
    <form role="form" action="{{ route('admin.loaitin.them') }}" method="POST">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tên thể loại</label>
          <select class="form-control" id="exampleFormControlSelect1" name ="ChonTL">
            @foreach($theloai as $tl)
            <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tên loại tin</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Loại tin" name="Ten">
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </form>
</div>
@endsection