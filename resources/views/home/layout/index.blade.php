<!doctype html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom1.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom1.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    @include('home/layout/header')
    <div class="index">
        <div class="row">
            <div class="col-8 mt-4">
                <div class="tieude">Trang chủ</div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <img src="https://vtv1.mediacdn.vn/thumb_w/650/2019/5/22/minions-2-the-rise-of-gru-release-date-15584953650321858753011.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card mb-3 mt-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="https://d3nt9em9l1urz8.cloudfront.net/media/catalog/product/cache/3/image/9df78eab33525d08d6e5fb8d27136e95/0/1/0132_190824_mp4otl_y_3.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-4">
                <div class="tieude">Xem nhiều</div>
                <div class="card border-secondary mb-3 mt-4" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Secondary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card border-secondary mb-3 mt-4" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Secondary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home/layout/footer')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>