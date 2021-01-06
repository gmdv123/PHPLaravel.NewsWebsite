@extends('layout/index')
@section('content')
<div class="index">
<div class="row">
<div class="col-md-8">

    
        <h1 class="my-4 tieude" style="color: blue">{{ $loaitin->Ten }}
        </h1>
        @foreach($tintuc as $tt)
        <!-- Blog Post -->
        <div class="card mb-4" style="display: block;">
          <img class="card-img-top mw-100" style="width:750px;height:300px" src="{{asset('upload/tintuc/'.$tt->Hinh)}}">
          <div class="card-body">
            <h4 class="card-title">{{ $tt->TieuDe }}</h4>
            <p class="card-text">{{ $tt->TomTat }}</p>
            <a href="{{url('tintuc/'.$tt->id)}}" class="btn btn-primary">Xem tiếp →</a>
          </div>
          <div class="card-footer text-muted">
            Cập nhật vào ngày : {{ $tt->created_at }}
          </div>
        </div>
     
      <!-- Blog Post -->
      @endforeach
        
</div>
<div class="col-4 mt-4">
    <div class="tieude">Liên hệ quảng cáo</div>
</div>
</div>
</div>
<div class="mt-2 d-flex justify-content-center">
    {{ $tintuc->links() }}
  </div>
@endsection