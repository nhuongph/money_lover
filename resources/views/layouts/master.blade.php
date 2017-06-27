<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Money love - Manager you money</title>
        
        <!-- Bootstrap Core CSS -->
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


        <!-- Template js -->
        <script src="{{ asset('layouts/js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('layouts/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('layouts/js/contact_me.js') }}"></script>
        <script src="{{ asset('layouts/js/jqBootstrapValidation.js') }}"></script>
        <script src="{{ asset('layouts/js/modernizr.custom.js') }}"></script>
        <script src="{{ asset('layouts/js/script.js') }}"></script>

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
                            <span>Manager You Money</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-right">
                Xin Chào {{ Auth::user()->username }} | <a href="{!! url('wellcome/vi') !!}">Việt Nam</a> &nbsp;<a href="{!! url('wellcome/en') !!}">English</a> | <a href="{!! url('logout') !!}">Logout</a>
            </div>
        </section>
        <!-- End Logo Section -->
        
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        
                        <div class="menu-item light-red">
                            <a href="{!! url('update') !!}/{!! Auth::user()->username !!}" data-toggle="modal">
                                <i class="fa fa-user"></i>
                                <p>Update User</p>
                            </a>
                        </div>
                        
                        <div class="menu-item green">
                            <a href="{!! url('wallet') !!}" data-toggle="modal">
                                <i class="fa fa fa-money"></i>
                                <p>All Wallet</p>
                            </a>
                        </div>
                        
                        <div class="menu-item blue">
                            <a href="{!! url('addwallet') !!}" data-toggle="modal">
                                <i class="glyphicon glyphicon-star-empty"></i>
                                <p>New Wallet</p>
                            </a>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                        <!-- Start Carousel Section -->
                        <div class="home-slider">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding-bottom: 30px;">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="{{ asset('layouts/images/about-03.jpg') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('layouts/images/about-02.jpg') }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('layouts/images/about-01.jpg') }}" class="img-responsive" alt="">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Start Carousel Section -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="menu-item color responsive">
                                    <a href="{!! url('category') !!}" data-toggle="modal">
                                        <i class="glyphicon glyphicon-th-list"></i>
                                        <p>All Categories</p>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="menu-item light-orange responsive-2">
                                    <a href="{!! url('addcategory') !!}" data-toggle="modal">
                                        <i class="fa fa-plus"></i>
                                        <p>New Category</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-3">
                        
                        <div class="menu-item light-red">
                            <a href="{!! url('transactions') !!}" data-toggle="modal">
                                <i class="fa fa-shopping-cart"></i>
                                <p>All Transaction money</p>
                            </a>
                        </div>
                        
                        <div class="menu-item color">
                            <a href="{!! url('addtransaction') !!}" data-toggle="modal">
                                <i class="fa fa-pencil-square-o"></i>
                                <p>New Transaction</p>
                            </a>
                        </div>
                        
                        <div class="menu-item blue">
                            <a href="{!! url('reportmonth') !!}" data-toggle="modal">
                                <i class="fa fa-area-chart"></i>
                                <p>Report Transaction</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->
        
        <!-- Start Service Section -->
        <div class="section-modal modal fade" id="service-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Our Services</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-2">
                                <div class="media">
                                    <i class="fa fa-magic pull-left"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">Web Design</h4>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-2">
                                <div class="media">
                                    <i class="fa fa-css3 pull-left"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">HTML5 & CSS3</h4>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-2">
                                <div class="media">
                                    <i class="fa fa-wordpress pull-left"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">Wordpress Theme</h4>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-2">
                                <div class="media">
                                    <i class="fa fa-plug pull-left"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">Wordpress Plugin</h4>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-2">
                                <div class="media">
                                    <i class="fa fa-joomla pull-left"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">Joomla Template</h4>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="feature-2">
                                <div class="media">
                                    <i class="fa fa-cube pull-left"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">Joomla Extension</h4>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-md-4 -->
                        
                    </div><!-- /.row -->
                </div>
                
                <div class="pricing-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="pricing-table">
                                    <div class="plan-name">
                                        <h3>Free</h3>
                                    </div>
                                    <div class="plan-price">
                                        <div class="price-value">$49<span>.00</span></div>
                                        <div class="interval">per month</div>
                                    </div>
                                    <div class="plan-list">
                                        <ul>
                                            <li>40 GB Storage</li>
                                            <li>40GB Transfer</li>
                                            <li>10 Domains</li>
                                            <li>20 Projects</li>
                                            <li>Free installation</li>
                                        </ul>
                                    </div>
                                    <div class="plan-signup">
                                        <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- End Service Section -->
        
    </body>
    
</html>