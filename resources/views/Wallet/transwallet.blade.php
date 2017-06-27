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

    <h1 class="text-center">{{ trans('money_lover.wallet_trans') }}</h1>
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
    <div class="wallet col-md-12">
        <h3>{{ trans('money_lover.wallet_from') }}</h3>
        <table class="table table-striped text-left padding-top-bot">
            <tr>
                <th>{{ trans('money_lover.wallet_avatar2') }}</th>
                <th>{{ trans('money_lover.wallet_name') }}</th>
                <th>{{ trans('money_lover.wallet_money') }}({!! $wallet->type_money !!})</th>
                <th>{{ trans('money_lover.wallet_note') }}</th>
            </tr>
            <tr>
                <td><img src="{!! asset($wallet->image) !!}" /></td>
                <td>{!! $wallet->name !!}</td>
                <td>{!! $wallet->money !!}</td>
                <td>{!! $wallet->note !!}</td>                                    
            </tr>
        </table>
    </div>
    <div class="chose_wallet"> 
        <table class="table table-hover">
            <hr>
            <div class="col-md-8 col-md-offset-0">
                <h3>{{ trans('money_lover.wallet_to') }}</h3>
                {!! Form::open(array('url' => 'transwallet','class'=>'form-signin')) !!}
                {!! Form::hidden('id', $wallet->id) !!}
                <div class="form-group">
                    {!! Form::label('select_wallet',Lang::get('money_lover.wallet_to_1').':') !!}
                    {!! Form::select('select_wallet', $wallets, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('trans_money',Lang::get('money_lover.wallet_to_2').':') !!}
                    {!! Form::text('trans_money',null, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.wallet_to_2'))) !!}
                </div>
                {!! Form::submit('Transfer Money',['class' => 'btn btn-success']) !!}

            </div>
        </table>
    </div>
    {!! Form::close() !!}<!-- /form -->
</div>
@endsection