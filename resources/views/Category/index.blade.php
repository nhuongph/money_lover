@extends('admin.master')
@section('content')

<div class="col-md-3 text-center">

    <div class="menu-item light-red">
        <a href="{!! url('home') !!}" data-toggle="modal">
            <i class="fa fa-home"></i>
            <p>{{ trans('money_lover.home') }}</p>
        </a>
    </div>

    <div class="menu-item light-orange responsive-2">
        <a href="{!! url('addcategory') !!}" data-toggle="modal">
            <i class="fa fa-plus"></i>
            <p>{{ trans('money_lover.cate_new') }}</p>
        </a>
    </div>

</div>

<div class="col-md-9 bg-white padding-top-bot col-md-offset-0">
    <div class="col-md-12 col-md-offset-0">
        <h1 class="text-center">{{ trans('money_lover.cate_all') }}</h1>
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
        <div class="wallet padding-top-bot">
            <table class="table table-striped" id="table_search">
                <tr>
                    <th>#</th>
                    <th>{{ trans('money_lover.avatar') }}</th>
                    <th>{{ trans('money_lover.cate_name') }}</th>
                    <th>{{ trans('money_lover.note') }}</th>
                    <th>{{ trans('money_lover.action') }}</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input class="form-control" type="text" id="search_name" name="search_name" placeholder="Search Name"/></td>
                    <td><input class="form-control" type="text" id="search_note" name="search_note" placeholder="Search Note"/></td>
                    <td></td>
                </tr>
                @foreach($categories as $key=>$var)
                <tr class="foreach">
                    <td>{{ ($key+1) }}</td>
                    <td><img src="{!! $var->image !!}" /></td>
                    <td>{!! $var->name !!}</td>
                    <td>{!! $var->note !!}</td>
                    <td>
                        <a href="{!! url('updatecategory') !!}/{!! $var->id !!}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Edit infor Category"></span>
                        </a>&nbsp;
                        <a href="{!! url('deletecategory') !!}/{!! $var->id !!}" title="Delete Category">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>                
                @endforeach
            </table>  
            <div class="page">{!! $categories->links() !!}</div>
        </div>
    </div>
</div>
@endsection