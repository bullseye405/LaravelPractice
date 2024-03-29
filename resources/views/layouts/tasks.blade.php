@extends('layouts.app')

@section('content')
{{-- Bootstrap boilerplate --}}
<div class="panel-l=body">

    @include('common.errors')    
    
    {{-- new task form --}}
    <form action="/task" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{-- Task Name --}}
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">
                Task
            </label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name"
                    class="form-control">
            </div>

            <label for="task" class="col-sm-3 control-label">
                Completed?
            </label>
            <div class="col-sm-6">
                    <input type="text" name="progress" id="task-completeness"
                    class="form-control">
            </div>

        </div>
        
        {{-- Add Task Button --}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
        </div>
</form>
</div>

@if (count($tasks)>0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Added tasks are listed here
        </div>
        
        <div class="panel-body">
            <table class="table table-striped task-table">
                {{-- Table Headings --}}

                <thead>
                    <th>Task</th>
                    <th>Progress</th>
                    <th>&nbsp;</th>
                </thead>

                {{-- Table Body --}}
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            {{-- Task Name --}}
                            <td class="table-text">
                                <div>{{ $task->name}} </div>
                            </td>
                            <td class="table-text">
                                    <div>{{ $task->progress}} </div>
                                </td>

                             {{--Delete button --}}
                            <td>
                               <form action="/task/{{$task->id}}"
                                    method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button>Delete Task</button>
                               </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection