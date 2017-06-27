<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Money lover</title>
        
        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">     
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="{{ asset('layouts/css/font-awesome.min.css') }}" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="{{ asset('layouts/css/animate.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('layouts/css/style.css') }}" rel="stylesheet">
        
        <!-- NhuongPH CSS -->
        <link href="{{ asset('layouts/css/mycss.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='{{ asset('layouts/css/font-Lobster.css') }}' rel='stylesheet' type='text/css'>

        <!-- Datepicker Fonts -->
        <link href='{{ asset('datepicker/css/datepicker.css') }}' rel='stylesheet' type='text/css'>

        <!-- Template js -->
        <script src="{{ asset('layouts/js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('layouts/js/jquery.appear.js') }}"></script>
        <!--<script src="{{ asset('layouts/js/contact_me.js') }}"></script>-->
        <script src="{{ asset('layouts/js/jqBootstrapValidation.js') }}"></script>
        <script src="{{ asset('layouts/js/modernizr.custom.js') }}"></script>
        <script src="{{ asset('layouts/js/script.js') }}"></script>
        <script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    
    <body>
        
        <!-- Start Logo Section -->
        <section id="logo-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>Money Lover</h1>
                            <span>{!! trans('money_lover.sologan') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-right container">
                <?php if(Auth::check()){ ?>
                {{ trans('money_lover.welcome',['name' => Auth::user()->username]) }} | <a href="{!! url('welcome/vi') !!}">Việt Nam</a> &nbsp;<a href="{!! url('welcome/en') !!}">English</a> | <a href="{!! url('logout') !!}">{{ trans('money_lover.logout') }}</a>
                <?php } ?>
            </div>
        </section>
        <!-- End Logo Section -->
        
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section">
            <div class="container">
                <div class="row">                    
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->
        
    </body>
    
</html>