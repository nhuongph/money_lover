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

    <div class="menu-item blue">
        <a href="{!! url('addwallet') !!}" data-toggle="modal">
            <i class="glyphicon glyphicon-star-empty"></i>
            <p>{{ trans('money_lover.wallet_new') }}</p>
        </a>
    </div>

</div>

<div class="col-md-9 bg-white padding-top-bot col-md-offset-0">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center">{{ trans('money_lover.wallet_update') }}</h1>
        <p class="text-center"><img id="profile-img" class="profile-img-card padding-top-bot" src="{!! asset($wallet->image) !!}" /></p>
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
        {!! Form::open(array('url' => 'updatewallet', 'files' => true, 'class'=>'form-signin')) !!}
        {!! Form::hidden('id',$wallet->id) !!}
        <div class="form-group">
            {!! Form::label('name',Lang::get('money_lover.wallet_name').':') !!}
            {!! Form::text('name',$wallet->name, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.wallet_name'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('money',Lang::get('money_lover.wallet_money').':') !!}
            {!! Form::text('money',$wallet->money, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.wallet_money'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type_money',Lang::get('money_lover.wallet_type').':') !!}
            {!! Form::select('type_money', [''=>'--- '.Lang::get('money_lover.select').' ---','đ'=>'đ','$'=>'$','£'=>'£'], $wallet->type_money, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('note',Lang::get('money_lover.wallet_note').':') !!}
            {!! Form::textarea('note', $wallet->note, ['class' => 'form-control','placeholder'=>Lang::get('money_lover.wallet_note')]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image',Lang::get('money_lover.wallet_avatar').':') !!}
            {!! Form::file('image',['class'=>"btn btn-default btn-file form-control"]) !!}
            <p class="help-block">{{ trans('money_lover.wallet_avatar1') }}.</p>
        </div>
        {!! Form::submit(Lang::get('money_lover.wallet_update'),['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}<!-- /form -->
    </div>
</div>
@endsection