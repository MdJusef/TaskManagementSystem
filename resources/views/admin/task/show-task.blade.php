@extends('admin.master')

@section('title')
    Task List
@endsection

@section('content')
    <h1 class="text-center py-5">tasks</h1>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tasks List</div>

                    <div class="card-body">

                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Task Name</th>
                                <th>Product Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->status==1?'incompleted':'completed' }}</td>
                                    <td>
                                        @if($task->status == 1)
                                            <a class="btn btn-outline-danger" href="{{ route('status',['id'=>$task->id]) }}">Complete</a>
                                        @else
                                            <a class="btn btn-outline-primary" href="{{ route('status',['id'=>$task->id]) }}">Incomplete</a>
                                        @endif
                                        <a class="btn btn-outline-danger" href="{{ route('edit-task',[$task->id]) }}">Edit</a>
                                        <form action="{{ route('delete.task',[$task->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            <input type="submit" value="delete" class="btn btn-outline-primary" >
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

