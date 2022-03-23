<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>@yield('page-title', 'Book Roy')</title>
</head>
<body>
<div class="container-fluid bg-pri"  style="height: 150px">
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-9">
                <div class="topbar container ">
                    <div class="topleft color-2" style="font-size: 24px;">
                        <a href="/" style="text-decoration: none; "><span ><i class="fas fa-book"></i></span> <b>Bookroy.com</b></a>
                        <a href="" style=" text-decoration: none;"><b style="font-size: 16px;color:white;">All Ads</b></a>
                    </div>
                    <div class="topright">
<!--                        <a href=""><i class="far fa-comments fa-lg"></i> Chat</a>-->
                        @if(auth('web')->user())

                        <a target="_blank" href="{{route('user.login')}}"><i class="fa-solid fa-gem"></i>


                            My Account</a>
                            <button class="btn btn-warning" style="font-weight: bold" >
                            <a href="{{route('checkout')}}">
                            Premium <i class="fa-solid fa-gem"></i>
                           </a> </button>

                        @else
                        <a target="_blank" href="{{route('user.login')}}"><i class="far fa-user fa-lg"></i> Login</a>

                        @endif

                    </div>
                </div>



<!-- Topbar Design End here -->
