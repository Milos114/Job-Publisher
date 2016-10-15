<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}">

    <title>Board Admin</title>

    <!-- bootstrap theme -->
    <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!-- font icon -->
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />


    <!-- Custom styles -->
    <link href="{{asset('admin/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">


</head>

<body>
<!-- container section start -->
<section id="container" class="">

    <!--header start-->
    @include('partials.admin.header')
    <!--header end-->

    <!--sidebar start-->
    @include('partials.admin.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>
    <!--main content end-->
</section>

<!-- javascripts -->
<script src="js/jquery-1.8.3.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--custome script for all page-->
<script src="js/scripts.js"></script>

</body>
</html>
