@extends('layouts._base', ['module' => 'home'])
@section('base_content')
    @parent
    @include('common._nav')

    @if(count($banners) > 0)
        @include('home._banner')
    @endif

    @if(count($photos) > 0)
        @include('home._photo')
    @endif

    @if(count($notes) > 0)
        @include('home._notes')
    @endif

    @include('home._more')
@endsection