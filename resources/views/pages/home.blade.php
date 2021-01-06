@extends('layout/index')
@section('content')
<div class="index">
                {{-- Slide --}}
                   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = 0; ?>
                        @foreach($slide as $sl)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" 
                        @if ($i == 0)
                        class="active"
                        @endif
                        ></li>
                        <?php $i++ ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                    <?php $i =0;?>
                    @foreach($slide as $sl)
                    <div 
                      @if($i == 0)
                      class="carousel-item active" 
                      @else
                      class="carousel-item"
                      @endif
                      >
                    <?php $i++; ?>
                    <img class="d-block w-100 mt-3" style="width:100%;height:250px;" src="{{asset('upload/slide/'.$sl->Hinh)}}" alt="{{ $sl->NoiDung }}">
                    </div>
                    @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                {{-- Slide --}}
        <div class="row">
            <div class="col-8 mt-3">
                <div class="tieude">Trang chủ</div>
                @foreach($tintuc as $tt)
                <div class="card mb-3 mt-4">
                    <div class="row no-gutters">
                        <img style="width:200px;height:200px;" src="{{asset('upload/tintuc/'.$tt->Hinh)}}" class="card-img" alt="...">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$tt->TieuDe}} |
                                <small>{{ $tt->loaitin->Ten}} /</small>
                                <small>{{ $tt->loaitin->theloai->Ten}}</small>
                                </h5>
                                <p class="card-text">{{ $tt->TomTat }} 
                                <br>
                                <small>Cập nhật vào ngày : {{ $tt->created_at }}</small></p>
                                <a href="{{url('tintuc/'.$tt->id)}}" class="btn btn-primary">Xem tiếp →</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-4 mt-3">
                <div class="tieude">Tin nổi bật</div>
                @foreach($tinnoibat as $tnb)
                <div class="card mb-3 mt-2" style="width: 18rem;">
                    <img class="card-img-top" style="width:286px;height:180px" src="{{asset('upload/tintuc/'.$tnb->Hinh)}}" >
                    <div class="card-body">
                      <h5 class="card-title">{{ $tnb->TieuDe }}</h5>
                      <p class="card-text">{{ $tnb->TomTat }}.</p>
                      <a href="{{url('tintuc/'.$tnb->id)}}" class="btn btn-primary">Xem tiếp →</a>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
</div>
<div class="mt-2 d-flex justify-content-center">
    {{ $tintuc->links() }}
  </div>
@endsection