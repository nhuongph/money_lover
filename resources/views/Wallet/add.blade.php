@extends('admin.master')
@section('content')

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('home') !!}" data-toggle="modal">
            <i class="fa fa-home"></i>
            <p>{{ trans('money_lover.wallet_home') }}</p>
        </a>
    </div>

    <div class="menu-item green">
        <a href="{!! url('wallet') !!}" data-toggle="modal">
            <i class="fa fa fa-money"></i>
            <p>{{ trans('money_lover.wallet_all') }}</p>
        </a>
    </div>

</div>

<div class="col-md-9 bg-white col-md-offset-0 padding-top-bot">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center">{{ trans('money_lover.wallet_new') }}</h1>
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
        {!! Form::open(array('url' => 'addwallet', 'files' => true, 'class'=>'form-signin padding-top-bot')) !!}
        <div class="form-group">
            {!! Form::label('name',Lang::get('money_lover.wallet_name').':') !!}
            {!! Form::text('name',null, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.wallet_name'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('money',Lang::get('money_lover.wallet_money').':') !!}
            {!! Form::text('money',null, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.wallet_money'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type_money',Lang::get('money_lover.wallet_type').':') !!}
            {!! Form::select('type_money', [''=>'--- '.Lang::get('money_lover.select').' ---','đ'=>'đ','$'=>'$','£'=>'£'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('note',Lang::get('money_lover.wallet_note').':') !!}
            {!! Form::textarea('note', null, ['class' => 'form-control','placeholder'=>Lang::get('money_lover.wallet_note')."..."]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image',Lang::get('money_lover.wallet_avatar').':') !!}
            {!! Form::file('image',['class'=>"btn btn-default btn-file form-control"]) !!}
            <p class="help-block">{{ trans('money_lover.wallet_avatar1') }}</p>
        </div>
        {!! Form::submit(Lang::get('money_lover.wallet_new'),['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}<!-- /form -->
    </div>
</div>
@endsection