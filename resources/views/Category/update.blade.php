@extends('admin.master')
@section('content')

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('home') !!}" data-toggle="modal">
            <i class="fa fa-home"></i>
            <p>{{ trans('money_lover.home') }}</p>
        </a>
    </div>

    <div class="menu-item color responsive">
        <a href="{!! url('category') !!}" data-toggle="modal">
            <i class="glyphicon glyphicon-th-list"></i>
            <p>{{ trans('money_lover.cate_all') }}</p>
        </a>
    </div>

    <div class="menu-item light-orange responsive-2">
        <a href="{!! url('addcategory') !!}" data-toggle="modal">
            <i class="fa fa-plus"></i>
            <p>{{ trans('money_lover.cate_new') }}</p>
        </a>
    </div>

</div>

<div class="col-md-9 bg-white col-md-offset-0 padding-top-bot">
    <h1 class="text-center">{{ trans('money_lover.cate_update') }}</h1>
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
        {!! Form::open(array('url' => 'updatecategory', 'files' => true, 'class'=>'form-signin')) !!}
        {!! Form::hidden('id',$category->id) !!}
        <div class="form-group">
            {!! Form::label('category_id',Lang::get('money_lover.cate_name').':') !!}
            {!! Form::text('name',$category->name, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.cate_name'))) !!}
        </div>
        <div class="form-group">
            {!! Form::label('note',Lang::get('money_lover.note').':') !!}
            {!! Form::textarea('note',$category->note, array('class'=>'form-control','placeholder'=>Lang::get('money_lover.note').'...')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image',Lang::get('money_lover.cate_image_1')) !!}
            {!! Form::file('image',['class'=>"btn btn-default btn-file form-control"]) !!}
            <p class="help-block">{{ trans('money_lover.cate_image_2') }}</p>
        </div>
        {!! Form::submit(Lang::get('money_lover.cate_update'),['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection