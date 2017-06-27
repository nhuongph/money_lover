@extends('admin.master')
@section('content')

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('login') !!}" data-toggle="modal">
            <i class="fa fa-user"></i>
            <p>{{ trans('money_lover.user_login') }}</p>
        </a>
    </div>

    <div class="menu-item green">
        <a href="{!! url('register') !!}" data-toggle="modal">
            <i class="fa fa fa-money"></i>
            <p>{{ trans('money_lover.user_register') }}</p>
        </a>
    </div>

    <div class="menu-item blue">
        <a href="{!! url('password/email') !!}" data-toggle="modal">
            <i class="glyphicon glyphicon-star-empty"></i>
            <p>{{ trans('money_lover.user_forgot') }}</p>
        </a>
    </div>

</div>

<div class="col-md-8 bg-white padding-top-bot col-md-offset-1">
    <p class="text-center"><img id="profile-img" class="profile-img-card img-circle" src="{!! asset('images/avatar_2x.png') !!}" />
    </p>
    <h1 class="text-center">{{ trans('money_lover.user_change_pass') }}</h1>

    <div class="col-md-6 col-md-offset-3">
        <!-- Start Carousel Section -->
        <div class="card card-container">

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('message'))

            <div class="alert alert-success">
                <ul>
                    <li>{!! session('message') !!}</li>
                </ul>
            </div>
            @endif
            {!! Form::open(array('url' => '/password/reset','class'=>'form-signin')) !!}
            {!!Form::hidden('token',$token,null)!!}
            <div class="form-group">
                {!! Form::label('email',Lang::get('money_lover.user_email').':') !!}
                {!! Form::email('email', null, ['class' => 'form-control','placeholder'=>Lang::get('money_lover.user_forgot_mes')]) !!}
            </div>
            <div class="form-group">                                    
                {!! Form::label('password',Lang::get('money_lover.user_pass').':') !!}
                {!! Form::password('password', ['class' => 'form-control','placeholder'=>Lang::get('money_lover.user_pass')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('RE-password',Lang::get('money_lover.user_re_pass').':') !!}
                {!! Form::password('password_confirmation', ['type'=>'password','class' => 'form-control','placeholder'=>Lang::get('money_lover.user_re_pass')]) !!}
            </div>
            {!! Form::submit(Lang::get('money_lover.user_change_pass'),['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}<!-- /form -->
        </div><!-- /card-container -->
        <!-- Start Carousel Section -->
    </div>
</div>
@endsection