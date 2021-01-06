<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom1.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
</head>
<body>
    <div style="width: 1140px;margin-right:auto;margin-left:auto">
        <img src="img/banner.png" class="img-fluid" alt="Responsive image">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#">yhoccotruyen.edu.vn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bản tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ngành nghề</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hệ đào tạo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Đại học</a>
                        <a class="dropdown-item" href="#">Cao đẳng</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Điểm chuẩn
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Năm 2019</a>
                        <a class="dropdown-item" href="#">Năm 2018</a>
                        <a class="dropdown-item" href="#">Năm 2017</a>
                        <a class="dropdown-item" href="#">Năm 2016</a>
                        <a class="dropdown-item" href="#">Năm 2015</a>
                        <a class="dropdown-item" href="#">Năm 2014</a>
                        <a class="dropdown-item" href="#">Năm 2013</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đề thi - đáp án</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Góc sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="text-center mr-2">
                <a href="#myModal2" class="btn btn-primary" class="mr-2" class="trigger-btn mt-5" type="submit" data-toggle="modal" style="box-shadow:none">Đăng kí</a>
            </div>
            <div class="btnlogin">
                <a href="#myModal" class="btn btn-primary" class="trigger-btn" type="submit" data-toggle="modal" style="box-shadow:none">Đăng nhập</a>
            </div>
        </div>
    </nav>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Đăng nhập</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="outline:none">&times;</button>
                </div>
                <div class="modal-body">
                <form action="{{route('admin')}}" method="post">
                    @csrf
                        <div class="form-group mt-2">
                            <i class="fa fa-user pr-2"></i>
                            <b>TÀI KHOẢN</b>
                            <input type="text" class="form-control mt-2" placeholder="Tên đăng nhập" required="required" style="width: 100%;" name="username">
                        </div>
                        <div class="form-group mt-4">
                            <i class="fa fa-lock pr-2"></i>
                            <b>MẬT KHẨU</b>
                            <input type="password" class="form-control mt-2" placeholder="Mật khẩu" required="required" style="width: 100%;" name="password">
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
                    @section('script2')
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
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>