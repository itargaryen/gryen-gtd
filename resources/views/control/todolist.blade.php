@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="#">New Todo</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-object-align-bottom"></span></a>
        </li>
    </ul>
@endsection
@section('content')
    @include('todos.create')
    <ul class="list-unstyled tar-todo-list">
        <li class="btn-toolbar col-xs-12">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    未开始
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">未开始</a></li>
                    <li><a href="#">进行中</a></li>
                    <li><a href="#">已完成</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <span class="glyphicon glyphicon-arrow-right"></span>
            </div>
            <div class="btn-group">
                <button class="btn btn-default">这是一条任务</button>
                <button class="btn btn-default">2016.11.20</button>
                <button class="btn btn-default">2016.11.21</button>
                <button class="btn btn-default">delete</button>
            </div>
        </li>
        <li class="btn-toolbar col-xs-12">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    未开始
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">未开始</a></li>
                    <li><a href="#">进行中</a></li>
                    <li><a href="#">已完成</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <span class="glyphicon glyphicon-arrow-right"></span>
            </div>
            <div class="btn-group">
                <button class="btn btn-default">这是一条任务</button>
                <button class="btn btn-default">2016.11.20</button>
                <button class="btn btn-default">2016.11.21</button>
                <button class="btn btn-default">delete</button>
            </div>
        </li>
    </ul>
@endsection