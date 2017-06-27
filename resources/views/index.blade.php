@extends('admin.master')
@section('content')

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('update') !!}/{!! Auth::user()->username !!}" data-toggle="modal">
            <i class="fa fa-user"></i>
            <p>{{ trans('money_lover.user_update') }}</p>
        </a>
    </div>

    <div class="menu-item green">
        <a href="{!! url('wallet') !!}" data-toggle="modal">
            <i class="fa fa fa-money"></i>
            <p>{{ trans('money_lover.wallet_all') }}</p>
        </a>
    </div>

    <div class="menu-item blue">
        <a href="{!! url('addwallet') !!}" data-toggle="modal">
            <i class="glyphicon glyphicon-star-empty"></i>
            <p>{{ trans('money_lover.wallet_new') }}</p>
        </a>
    </div>

</div>

<div class="col-md-6 text-center">

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
                    <p>{{ trans('money_lover.cate_all') }}</p>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="menu-item light-orange responsive-2">
                <a href="{!! url('addcategory') !!}" data-toggle="modal">
                    <i class="fa fa-plus"></i>
                    <p>{{ trans('money_lover.cate_new') }}</p>
                </a>
            </div>
        </div>

    </div>

</div>

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('transactions') !!}" data-toggle="modal">
            <i class="fa fa-shopping-cart"></i>
            <p>{{ trans('money_lover.trans_all') }}</p>
        </a>
    </div>

    <div class="menu-item color">
        <a href="{!! url('addtransaction') !!}" data-toggle="modal">
            <i class="fa fa-pencil-square-o"></i>
            <p>{{ trans('money_lover.trans_new') }}</p>
        </a>
    </div>

    <div class="menu-item blue">
        <a href="{!! url('reportmonth') !!}" data-toggle="modal">
            <i class="fa fa-area-chart"></i>
            <p>{{ trans('money_lover.trans_report') }}</p>
        </a>
    </div>

</div>
@endsection