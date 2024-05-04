<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnethub | Dashboard</title>
    <link rel="stylesheet" href="/user/css/style.css">
    <link rel="stylesheet" href="/user/css/responsive.css">
    <link rel="stylesheet" href="/user/css/bootstrap.css">
    <link rel="stylesheet" href="/user/css/swiper-bundle.min.css0-+23
    ">
    <link rel="stylesheet" href="/user/css/singledivui.min.css">
    <!-- Own Style-->
    <link href="/dashboard/assets/css/own.css" rel="stylesheet">
</head>

<body>

    <!--Header-->
    <section class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-4 d-flex align-items-center">
                    <a class="navbar-brand" href="/dashboard/user"><img src="/user/image/logo.png" alt=""></a>
                    <div id="side">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </div>
                </div>
                <div class="col-sm-8 d-flex justify-content-end">
                    <div class="dropdown c-drop">
                        <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/user/image/men.jpg" alt="">
                            {{ session()->get("name") }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Log
                                Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Side Bar-->
    <section class="side-bar active">
        <ul>
            <li class="open"><a href="/dashboard/user"><i class="fa-solid fa-chart-line"></i> <span>Dashboard</span> </a></li>
            <li><a href="/dashboard/user/project"><i class="fa-brands fa-wordpress-simple"></i> <span>Projects</span> </a></li>

            {{-- <li class="list-b"><a><i class="fa-solid fa-folder-plus"></i> <span>Listing / User</span> </a></li> --}}
            {{-- <div class="list-item">
                <a href="user-listing.php">User Listing</a>
                <a href="my-listing.php">My Listing</a>
                <a href="pending.php">Pending Listing</a>
                <a href="">Categories</a>
                <a href="">Locations</a>
                <a href="">Review</a>
                <a href="">User Management</a>
                <a href="">Orders </a>
                <a href="">Pending Orders</a>
                <a href="">Day</a>
                <a href="">Claim / Verify</a>
            </div> --}}


            {{-- <li><a href=""><i class="fa-solid fa-gear"></i> <span>Pages</span> </a></li>
            <li><a href=""><i class="fa-brands fa-elementor"></i> <span>Charts</span> </a></li>
            <li><a href=""><i class="fa-solid fa-envelope-open"></i> <span>Form</span> </a></li>
            <li><a href=""><i class="fa-regular fa-face-smile"></i> <span>Ecommerce</span> </a></li>
            <li class="drop-b"><a href=""><i class="fa-solid fa-address-book"></i> <span>Contacts</span> </a>
            </li> --}}

            <li class="profile-b"><a><img src="/user/image/men.jpg" alt=""> <span> Mr Bean</span> </a></li>
  *          <div class="profile-item">
                <a href="">Ho0</a>
                <a href="">ka</a>
            </div>
        </ul>
    </section>

    <!--main-->
    <section class="main">
        <div class="container-fluid var width-s">
            <div class="row justify-content-end">
                <div class=" col-12">
                    <!--main-dash   -->
                    <section class="main-dash">
                        <div class="container-fluid">

