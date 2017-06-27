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

</div>

<div class="col-md-9 bg-white padding-top-bot col-md-offset-0">
    <h1 class="text-center">{{ trans('money_lover.trans_report') }}</h1>
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
        {!! Form::open(array('url' => 'reportmonth','class'=>'form-signin col-md-8')) !!}
        <div class="form-group">
            {!! Form::label('month',Lang::get('money_lover.trans_month').':') !!}
            {!! Form::text('month',null, array('class'=>'datepicker form-control', 'data-date' => '102/2012' ,'data-date-format' => 'mm/yyyy', 'data-date-viewmode' => "years", 'data-date-minviewmode' =>"months",'placeholder'=>Lang::get('money_lover.trans_month'))) !!}
            <script>
                $('.datepicker').datepicker();
            </script>
        </div>
        {!! Form::submit(Lang::get('money_lover.trans_search'),['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
        <div class="wallet padding-top-bot">
            <table class="table table-striped">
                <tr>
                    <th>{{ trans('money_lover.avatar') }}</th>
                    <th>{{ trans('money_lover.trans_name') }}</th>
                    <th>{{ trans('money_lover.trans_money') }}</th>
                    <th>{{ trans('money_lover.note') }}</th>
                    <th>{{ trans('money_lover.action') }}</th>
                </tr>
                @foreach($transmoneys as $var)
                <tr>
                    <td><img src="{!! $var->image !!}" /></td>
                    <td>{!! $var->name !!}</td>
                    <td>{!! $var->money !!}</td>
                    <td>{!! $var->note !!}</td>
                    <td>
                        <a href="{!! url('updatetransaction') !!}/{!! $var->id !!}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" title="{{ trans('money_lover.trans_update') }}"></span>
                        </a>&nbsp;
                        <a href="{!! url('deletetransaction') !!}/{!! $var->id !!}" title="{{ trans('money_lover.trans_del') }}">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>  
            {!! $transmoneys->links() !!}
        </div>
        <div class="wallet padding-top-bot">
            <td><a class = "btn btn-success" href="{!! url('reportexcel') !!}">{{ trans('money_lover.excel') }}</a></td>
        </div>
    </div>
</div>
@endsection