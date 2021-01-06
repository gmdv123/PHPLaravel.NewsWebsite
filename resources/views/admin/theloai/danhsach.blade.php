@extends('admin.layout.admin')
@section('content')
{{-- Tiêu đề --}}
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
          <li class="breadcrumb-item active">Danh sách</li>
        </ol>
      </div>
    </div>
  </div>
</div>
@if(session('xoa'))
<div class="alert alert-danger" role="alert">
    {{ session('xoa') }}
</div>
@endif
{{-- Tiêu đề --}}
<div class="row">
  <div class="col-12">
    <div class="card card card-primary">
      <div class="card-header">
        <h3 class="card-title">Danh sách</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Tên không dấu</th>
              <th>Xóa</th>
              <th>Sửa</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($theloai ?? '' as $tl)
              <tr>     
              <td>{{ $tl->id }}</td>
              <td>{{ $tl->Ten }}</td>
              <td>{{ $tl->TenKhongDau }}</td>
              <td><a href="{{url('admin/theloai/xoa/'.$tl->id)}}" style="color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              <td><a href="{{url('admin/theloai/sua/'.$tl->id)}}"style="color:blue;"><i class="fa fa-wrench" aria-hidden="true"></i></a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
   
      </div>
      <!-- /.card-body -->
    </div>
    <div class="mt-2 d-flex justify-content-center">
      {{ $theloai->links() }}
    </div>
    <!-- /.card -->
  </div>
</div>
{{-- * --}}

@endsection