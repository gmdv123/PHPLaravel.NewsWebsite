@extends('layout/index')
@section('content')
<div class="index">
<div class="row">
<div class="col-md-8">
        <!-- Title -->
        <h1 class="mt-4" style="color: blue">{{ $tintuc->TieuDe }}</h1>

        <!-- Author -->
        {{-- <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>

        <hr> --}}

        <!-- Date/Time -->
        <p class="text-muted">Đăng vào ngày {{ $tintuc->created_at }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" style="width:900px;height:300px" src="{{asset('upload/tintuc/'.$tintuc->Hinh)}}">

        <hr>

        <!-- Post Content -->
        {!! $tintuc->NoiDung !!}
        <hr>
        <!-- Comments Form -->
        @auth
        <div class="card my-4">
          <h5 class="card-header">Để lại bình luận:</h5>
          <div class="card-body">
            <form action="{{ url('comment/'.$tintuc->id) }}" method="post">
              <input type="hidden" name="_token"/>
              @csrf
              <div class="form-group">
                <textarea class="form-control" rows="3" name="NoiDungComment"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Đăng bình luận</button>
            </form>
          </div>
        </div>
        @endauth
        @guest
        <div>Vui lòng đăng nhập để bình luận</div><br>
        @endguest
        <!-- Single Comment -->
        @foreach($tintuc->comment as $cm)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $cm->user->name }} <small class="text-muted">{{ $cm->created_at }}</small></h5>
            {{ $cm->NoiDung }}
          </div>
        </div>
        @endforeach
        <!-- Comment with nested comments -->

        {{-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
          </div>
      </div>   --}}
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
    <div class="tieude">Tin liên quan</div>
    @foreach($tinlienquan as $tlq)
    <div class="card mb-3 mt-2" style="width: 18rem;">
        <img class="card-img-top" style="width:286px;height:180px" src="{{asset('upload/tintuc/'.$tlq->Hinh)}}" >
        <div class="card-body">
          <h5 class="card-title">{{ $tlq->TieuDe }}</h5>
          <p class="card-text">{{ $tlq->TomTat }}.</p>
          <a href="{{url('tintuc/'.$tlq->id)}}" class="btn btn-primary">Xem tiếp →</a>
        </div>
      </div>
    @endforeach
</div>
</div>
</div>
@endsection