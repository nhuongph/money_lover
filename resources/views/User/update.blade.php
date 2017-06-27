@extends('admin.master')
@section('content')
<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('home') !!}" data-toggle="modal">
            <i class="fa fa-home"></i>
            <p>{{ trans('money_lover.home') }}</p>
        </a>
    </div>

    <div class="menu-item green">
        <a href="{!! url('wallet') !!}" data-toggle="modal">
            <i class="fa fa fa-money"></i>
            <p>{{ trans('money_lover.wallet_all') }}</p>
        </a>
    </div>

    <div class="menu-item color responsive">
        <a href="{!! url('category') !!}" data-toggle="modal">
            <i class="glyphicon glyphicon-th-list"></i>
            <p>{{ trans('money_lover.cate_all') }}</p>
        </a>
    </div>

    <div class="menu-item light-red">
        <a href="{!! url('transactions') !!}" data-toggle="modal">
            <i class="fa fa-shopping-cart"></i>
            <p>{{ trans('money_lover.trans_all') }}</p>
        </a>
    </div>

</div>

<div class="col-md-8 bg-white padding-top-bot col-md-offset-1">
    <p class="text-center"><img id="profile-img" class="profile-img-card img-circle" src="{!! asset(Auth::user()->avatar) !!}" />
    </p>
    <h1 class="text-center">{{ trans('money_lover.user_update') }}</h1>
    <div class="col-md-8 col-md-offset-2">
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
            {!! Form::open(array('url' => 'update', 'files' => true, 'class'=>'form-signin')) !!}
            {!! Form::hidden('id',$user->id) !!}
            <div class="form-group">
                {!! Form::label('username',Lang::get('money_lover.user_user').':') !!}
                {!! Form::text('username', $user->username, ['class' => 'form-control','placeholder'=>Lang::get('money_lover.user_user')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',Lang::get('money_lover.user_email').':') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control','placeholder'=>Lang::get('money_lover.user_email')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password',Lang::get('money_lover.user_pass').':') !!}
                {!! Form::password('password', ['class' => 'form-control','placeholder'=>Lang::get('money_lover.user_pass')]) !!}
            </div>                
            <div class="form-group">
                {!! Form::label('password_confirmation',Lang::get('money_lover.user_re_pass').':') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>Lang::get('money_lover.user_re_pass')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('avatar',Lang::get('money_lover.user_avatar')) !!}
                {!! Form::file('avatar',['class'=>"btn btn-default btn-file form-control"]) !!}
            </div>
            {!! Form::submit(Lang::get('money_lover.user_update'),['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}<!-- /form -->
        </div><!-- /card-container -->
        <!-- Start Carousel Section -->
    </div>
</div>
@endsection