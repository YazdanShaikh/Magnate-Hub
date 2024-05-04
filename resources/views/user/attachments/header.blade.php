@include('user.attachments.head')

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper" style="width: 100px">
                        <a href="/dashboard/user">
                            <img class="img-fluid custom-nav-logo" src="/user/assets/images/logo/Dark-logo.png">
                        </a>
                    </div>
                    <div class="dark-logo-wrapper">
                        <a href="/dashboard/user">
                            <img class="img-fluid custom-nav-logo" src="/user/assets/images/logo/logo.png">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i>
                    </div>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li class="onhover-dropdown d-none" id="chat_Icon">
                            <div class="notification-box"><i data-feather="message-square"></i><span class="dot-animated"></span>
                            </div>
                            <ul class="chat-dropdown onhover-show-div" id="chat_notification"></ul>
                        </li>
                        <li class="onhover-dropdown p-0">
                            <button class="btn btn-primary-light" type="button"><a href="/logout"><i
                                        data-feather="log-out"></i>Log out</a></button>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper horizontal-menu">
            <!-- Page Sidebar Start-->
            <header class="main-nav custom-main-nav" style="">
                <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i
                            data-feather="settings"></i></a><img class="img-90 rounded-circle"
                        src="/user/assets/images/dashboard/1.png" alt="">
                    <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="/dashboard/user/setting">
                        <h6 class="mt-3 f-14 f-w-600">{{ session()->get("name") }}</h6>
                    </a>
                    <p class="mb-0 font-roboto">User Dashboard</p>
                </div>
                <nav>
                    <div class="main-navbar">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="mainnav">
                            @include("user.attachments.sidebar")
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>
            </header>
            <!-- Page Sidebar Ends-->
            <div class="page-body" style="padding-top: 80px;">
