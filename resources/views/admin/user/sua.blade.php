@extends('admin.layout.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">User <small>{{ $user->name }}</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">User</li>
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
          <a href="{{ route('admin.user.danhsach') }}">Đây</a>
      </div>
      @endif
      {{-- Lỗi --}}
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa User</h3>
    </div>
    <form role="form" action="{{ url('admin/user/sua/'.$user->id) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token"/>
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Tên người dùng</label>
          <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input type="password" class="form-control" placeholder="Mật khẩu" name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Quyền</label>
            <select class="form-control" name ="level">
              <option value="0">User</option>
              <option value="1">Admin</option>
            </select>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
      </div>
    </form>
</div>
@endsection