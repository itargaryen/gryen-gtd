@extends('layouts._control', ['module' => 'control'])
@section('content')
    <div>
        {!! Form::open(['action' => 'ToDosController@store']) !!}
        @include('todos._form', ['submitButtonText' => 'create todo'])
        {!! Form::close() !!}
    </div>
@endsection