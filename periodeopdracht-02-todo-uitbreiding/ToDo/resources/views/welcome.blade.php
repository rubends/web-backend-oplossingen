@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
                <div class="alert alert-info">{{Session::get('message')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Welkom op de tweede periode-opdracht</div>

                <div class="panel-body">
                    Registreer jezelf om aan je eigen ToDo lijstje te komen.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
