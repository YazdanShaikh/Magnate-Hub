<script>
    var xhr = new XMLHttpRequest();
    var url = '/Traffic/Insert';
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {}
    xhr.send();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Magnethub</title>
    <link rel="icon" type="image/x-icon" href="/website/images/black.png" />
    <link rel="stylesheet" href="/website/css/bootstrap.css">
    <link rel="stylesheet" href="/website/css/responsive.css">
    <link rel="stylesheet" href="/website/css/style.css">
    <link rel="stylesheet" href="/website/css/font-awesome-6.css">
    <link rel="stylesheet" href="/website/css/select.css">
    <link rel="stylesheet" href="/website/css/swiper.css">
    <link rel="stylesheet" href="/website/css/pricing.css">
    <link rel="stylesheet" href="/website/css/notification.css">
    <script src="/website/js/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="/website/js/popper.min.js"></script>
    <script src="/website/js/jquery.js"></script>
    <script src="/website/js/bootstrap.bundle.min.js"></script>
</head>
<div class="bottom-right">
    <div class="noti-icon"><i class="fa-regular fa-square-check"></i></div>
    <div class="noti-text">
        <h3></h3>
    </div>
</div>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/"><img src="/website/images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="new-div">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project">Listings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no" href="/investor">Investment Opportunities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/premium-package">Premium Package</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no" href="/pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no" href="/blog">Media</a>
                        </li>
                        <div class="dropdown n-drop">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/investor">Investment Opportunities</a>
                                <a class="dropdown-item" href="/pricing">Pricing</a>
                                <a class="dropdown-item" href="/blog">Media</a>
                            </div>
                        </div>
                    </ul>
                    <div class="right-side">
                        <li><a href="/project" class="nav- search"><i class="fa-solid fa-magnifying-glass"></i></a></li>

                        @if (!session()->get('raising_id'))
                            @if (!session()->get('user_id'))
                                <li><a class="signin" href="/login"><i class="fa-solid fa-user"></i> Log In</a></li>
                            @else
                                <li><a class="signin" href="/dashboard/user"><i class="fa-solid fa-user"></i> {{ session()->get("name") }}</a></li>
                            @endif
                        @endif

                        @if (session()->get('user_id'))
                            <div class="heart">
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        @endif

                        @if (!session()->get('user_id'))
                            @if (!session()->get('raising_id'))
                                <div class="dropdown custom_drop">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" >
                                        <i class="fa-solid fa-user"></i> Sign Up
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/register/raising">Capital Raiser Profile</a>
                                        <a class="dropdown-item" href="/register/seller">Sell a Business Profile</a>
                                        <a class="dropdown-item" href="/register">Browser Profile</a>
                                    </div>
                                </div>
                            @else
                                @if(session()->get("type") == 1)
                                    <a href="/dashboard/professionals/" class="btn theme-btn">Raising Dashboard <i class="fa-solid fa-paper-plane"></i></a>
                                @else
                                    <a href="/dashboard/professionals/" class="btn theme-btn">Seller Dashboard <i class="fa-solid fa-paper-plane"></i></a>
                                @endif
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </nav>
    </header>
