@extends('layouts.app')

@section('content')

        
     <!-- Current Tasks -->
    
        <div class="panel panel-default container">
            <div class="add">
            <a href="{{ url('/newtask') }}"><p>ToDo toevoegen</p></a>
            </div>
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
                                        <div class="taskdiv">
                                            <a href="{{ url('donetask/'.$task->id.'/'.$task->name) }}" class="task"><i class="fa fa-check check"></i>{{ $task->name }}</a>
                                        </div>
                                        
                                </td>

                                <td>
                                    <form action="{{ url('task/'.$task->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="del">X</button>
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
                                    <div>
                                        <a href="{{ url('notdone/'.$donetask->id.'/'.$donetask->name) }}" class="donetask"><i class="fa fa-check"></i>{{ $donetask->name }}</a>
                                    </div>
                                </td>

                                <td>
                                    <form action="{{ url('donetask/'.$donetask->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="del">X</button>
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