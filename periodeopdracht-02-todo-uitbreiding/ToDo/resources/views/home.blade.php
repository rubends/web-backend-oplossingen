@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (session('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
            @endif
            <div class="panel panel-default">

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
