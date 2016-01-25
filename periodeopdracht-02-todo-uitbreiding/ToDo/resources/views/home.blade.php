@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
                @endif
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welkom terug, {{ Auth::user()->name }}!</p>
                    <a href="{{ url('/tasks') }}"><i class="fa fa-btn"></i>Mijn ToDo's</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
