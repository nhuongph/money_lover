@extends('admin.master')
@section('content')

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('home') !!}" data-toggle="modal">
            <i class="fa fa-home"></i>
            <p>{{ trans('money_lover.home') }}</p>
        </a>
    </div>

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

<div class="col-md-9 bg-white padding-top-bot col-md-offset-0">
    <h1 class="text-center">{{ trans('money_lover.trans_update') }}</h1>
    <div class="col-md-10 col-md-offset-1 padding-top-bot">
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
        {!! Form::open(array('url' => '/updatetransaction','class'=>'form-signin')) !!}
        {!! Form::hidden('id', $transaction->id) !!}
        <div class="form-group">
            {!! Form::label('category_id',Lang::get('money_lover.cate_name').':') !!}
            {!! Form::select('category_id', $categories, $transaction->category_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('wallet_id',Lang::get('money_lover.wallet_name').':') !!}
            {!! Form::select('wallet_id', $wallets, $transaction->wallet_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('money',Lang::get('money_lover.trans_money').':') !!}
            {!! Form::text('money',$transaction->money, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.trans_note'))) !!}
        </div>

        <div class="form-group">
            {!! Form::label('note',Lang::get('money_lover.note').':') !!}
            {!! Form::textarea('note',$transaction->note, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.note').'...')) !!}
        </div>
        {!! Form::submit(Lang::get('money_lover.trans_update'),['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection