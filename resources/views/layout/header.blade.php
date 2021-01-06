    <div style="width: 1140px;margin-right:auto;margin-left:auto">
        <img src="img/banner.png" class="img-fluid" alt="Responsive image">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#">yhoccotruyen.edu.vn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- List --}}
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ<span class="sr-only"></span></a>
                </li>
            {{-- @foreach ($theloai as $tl)  
                @if(count($tl->loaitin) > 0)  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $tl->Ten }}
                    </a>
                    @foreach($tl->loaitin as $lt)
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="">{{ $lt ->Ten}}</a>
                    </div>
                    @endforeach
                </li>
                @endif
            @endforeach --}}
            @foreach($theloai as $tl)
            @if(count($tl->loaitin) > 0)
            <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $tl->Ten }}
                </a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($tl->loaitin as $lt)
                    <a class="dropdown-item" href="{{ url('loaitin/'.$lt->id) }}">{{ $lt->Ten }}</a>
                    @endforeach
                </div>
                
            </li>
            @endif
            @endforeach
            </ul>
            
            {{-- List --}}
            @auth
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::User()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('adminlogout') }}">Đăng xuất</a>
                </div>
               
            </div>
            @endauth
            @guest
            <div class="text-center mr-2">
                <a href="#myModal2" class="btn btn-primary" class="mr-2" class="trigger-btn mt-5" type="submit" data-toggle="modal" style="box-shadow:none">Đăng kí</a>
            </div>
            <div class="btnlogin">
                <a href="#myModal" class="btn btn-primary" class="trigger-btn" type="submit" data-toggle="modal" style="box-shadow:none">Đăng nhập</a>
            </div>
            @endguest
        </div>
    </nav>
    
    {{-- Đăng nhập --}}
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Đăng nhập</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="outline:none">&times;</button>
                </div>
                <div class="modal-body">
                <form action="{{route('user')}}" method="post">
                    @csrf
                        <div class="form-group mt-2">
                            <i class="fa fa-user pr-2"></i>
                            <b>TÀI KHOẢN</b>
                            <input type="text" class="form-control mt-2" placeholder="Tên đăng nhập"  style="width: 100%;" name="username">
                        </div>
                        <div class="form-group mt-4">
                            <i class="fa fa-lock pr-2"></i>
                            <b>MẬT KHẨU</b>
                            <input type="password" class="form-control mt-2" placeholder="Mật khẩu"  style="width: 100%;" name="password">
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Đăng nhập">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Đăng nhập --}}
    {{-- Đăng kí --}}
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Đăng Kí</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="outline:none">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('userregister')}}" method="POST">
                    <input type="hidden" name="_token"/>
                    @csrf
                        <div class="form-group mt-2">
                            <i class="fa fa-user pr-2"></i>
                            <b>TÀI KHOẢN</b>
                            <input type="text" class="form-control mt-2" placeholder="Tên đăng nhập" style="width: 100%;" name="name">
                        </div>
                        <div class="form-group mt-4">
                            <i class="fa fa-lock pr-2"></i>
                            <b>MẬT KHẨU</b>
                            <input type="password" class="form-control mt-2" placeholder="Mật khẩu" style="width: 100%;" name="password">
                        </div>
                        <div class="form-group mt-4">
                            <i class="fa fa-lock pr-2"></i>
                            <b>NHẬP LẠI MẬT KHẨU</b>
                            <input type="password" class="form-control mt-2" placeholder="Mật khẩu" style="width: 100%;" name="password_confirmation">
                        </div>
                        <div class="form-group mt-4">
                            <i class="fa fa-envelope pr-2" aria-hidden="true"></i>
                            <b>EMAIL</b>
                            <input type="text" class="form-control mt-2" placeholder="Email" style="width: 100%;" name="email">
                        </div>
                        <div class="form-group mt-4">
                            
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Đăng kí">
                        </div>
                    </form>
                </div>
    {{-- Đăng kí --}}        
                    {{-- Lỗi --}}
                    @if ($errors->any())
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach          
                    </div>
                    @endif      
                    @endif
                    {{-- Lỗi --}}
                    {{-- * --}}
                    @section('script')
                    @if (count($errors) > 0)
                    <script type="text/javascript">
                        $( document ).ready(function() {
                             $('#myModal2').modal('show');
                        });
                    </script>
                    @endif
                    @endsection
                    {{-- * --}}
                </div>
            </div>
        </div>