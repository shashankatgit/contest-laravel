<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>{{htmlentities('</CipherLogin/>')}}</title>
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/login.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/assets/custom-css/info-box.css')}}">
</head>
<body>
@include('includes.info-box')
<div class="container">
    <section id="content">
        <form action="{{route('postAdminLogin')}}" method="post">
            <h1>{{htmlentities('</AdminLogin/>')}}</h1>
            <div>
                <input type="text" placeholder="Email" required="" id="email" name="email"/>
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="password" name="password"/>
            </div>
            <div class="btn-container">
                <input type="submit" value="Log in"/>
            </div>
            {{--<div>--}}
            {{--<a href="#">Lost your password?</a>--}}
            {{--<a href="#">Register</a>--}}
            {{--</div>--}}

            <input type="hidden" name="_token" value="{{Session::token()}}"/>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>