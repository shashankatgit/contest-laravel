<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('/assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::to('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/assets/css/zabuto_calendar.css')}}'">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/assets/js/gritter/css/jquery.gritter.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/assets/lineicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/assets/custom-css/info-box.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/style-responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/common.css')}}" />

    @yield('styles')

</head>

<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b> {{htmlentities('<Cipher/>')}} </b></a>
        <!--logo end-->
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{route('user.logout')}}">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle"
                                                                width="60"></a></p>
                <h5 class="centered">Hi, {{Auth::guard('users')->user()->name}}</h5>

                <div style="margin-top:40px">
                    <li>
                        <a {{Request::route()->getName()=='user.home'? 'class=active':''  }} href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a {{Request::route()->getName()=='user.questions'? 'class=active':''  }} href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>My Questions</span>
                        </a>
                    </li>
                    <li>
                        <a {{Request::route()->getName()=='leaderboard'? 'class=active':''  }} href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>LeaderBoard</span>
                        </a>
                    </li>
                </div>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-9">
                    @yield('content');

                </div><!-- /col-lg-9 END SECTION MIDDLE -->


                {{--Right side bar--}}

                <div class="col-lg-3 ds notif-box">
                    <h3>NOTIFICATIONS</h3>

                    <!-- First Action -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>2 Minutes Ago</muted>
                                <br/>
                                <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                            </p>
                        </div>
                    </div>


                    <!-- USERS ONLINE SECTION -->
                    <h3>TEAM MEMBERS</h3>
                    <!-- First Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">DIVYA MANIAN</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>

                </div><!-- /col-lg-3 -->
            </div>
            <! --/row -->
        </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2016 - Shashank Singh
            <a href="index.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{URL::to('/assets/js/jquery.js')}}"></script>
<script src="{{URL::to('/assets/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{URL::to('/assets/js/bootstrap.min.js')}}"></script>


<!--common script for all pages-->
<script src="{{URL::to('/assets/js/common-scripts.js')}}"></script>

@yield('scripts')


</body>
</html>
