@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body container">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Nieuwe taak</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Toevoegen
                    </button>
                </div>
            </div>
        </form>
    </div>

     <!-- Current Tasks -->
    
        <div class="panel panel-default container">
            <div class="panel-heading">
                To do
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Taak</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                        <div><a href="{{ url('donetask/'.$task->id.'/'.$task->name) }}">{{ $task->name }}</a></div>
                                        
                                </td>

                                <td>
                                    <form action="{{ url('task/'.$task->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($tasks) < 1)
                <p> Nog geen ToDo items </p>
                @endif
            </div>

            <div class="panel-heading">
                Done
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Taak</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($donetasks as $donetask)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href="{{ url('notdone/'.$donetask->id.'/'.$donetask->name) }}">{{ $donetask->name }}</a></div>
                                </td>

                                <td>
                                    <form action="{{ url('donetask/'.$donetask->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($donetasks) < 1)
                <p> Aj, werk aan de winkel </p>
                @endif
            </div>
        </div>
@endsection