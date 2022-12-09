<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title> ...::: Project 2 :::... </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lineicons/style.css')}}">    

        
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="assets/css/style-responsive.css" >
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lineicons/style.css')}}">    


    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/chart-master/Chart.js')}}"></script>

    </head>
    
    <body>
        <!-- ***************************************************************************
        MAIN CONTENT
        **************************************************************************** -->

        <div class="container">

                @yield('content')	  	

        </div>

        <footer class="site-footer" style="  
                position:fixed;
                left:0px;
                bottom:0px;
                height:30px;
                width:100%;
                background:#999;">
            <div style="text-align: right; margin-right: 50px;">
                2022 - Apresentação de Teste
                <a href="/" class="go-top" style="text-align: center; margin-left: 10px;">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>

    </body>
</html>
