
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" co
    ntent="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Blank</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet"/>

</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
        </div>
        <!--logo start-->
        <a href="https://github.com/amirkhodabande" class="logo">Am<span>ir</span></a>
        <!--logo end-->

        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-left top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                @php
                    $user = auth()->user();
                @endphp
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <span class="username">{{ $user->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                        <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                        <li><a href="#"><i class="icon-bell-alt"></i>اعلام ها</a></li>
                        <li>
                            <a  href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="icon-key"></i>خروج
                            </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                    </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="/admin/dashbord">
                        <i class="icon-dashboard"></i>
                        <span>صفحه اصلی</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>کاربران</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{{ route('users.index') }}">لیست کاربران</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-upload"></i>
                        <span>مرکز آپلود</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{{ route('uploads.index') }}">لیست اپلود ها</a></li>
                        <li><a class="" href="{{ route('uploads.create') }}">اپلود تصویر</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-archive"></i>
                        <span>صفحات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="{{ route('pager.index') }}">لیست صفحه ها</a></li>
                        <li><a class="" href="{{ route('pager.create') }}">ساخت صفحه جدید</a></li>
                    </ul>
                </li>

                <li>
                    <a class="" href="login.html">
                        <i class="icon-user"></i>
                        <span>صفحه ورود به سایت</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper ">
            <!-- page start-->
                @yield('content')
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('admin/js/jquery.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>


<!--common script for all pages-->
<script src="{{ asset('admin/js/common-scripts.js') }}"></script>


</body>
</html>
