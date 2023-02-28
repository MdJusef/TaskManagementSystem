@extends('admin.master')

@section('title')
    Edit Task
@endsection

@section('content')
    <h1 class="text-center my-5">Edit Task</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-info"></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('update.task') }}" method="post">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <div class="form-group">
                            <input value="{{ $task->name }}" type="text" class="form-control" name="name" placeholder="Task Name" value="">
                        </div>
                        <div class="form-group">
                            <input style="height: 100px" type="text" value="{{ $task->description }}" name="description" cols="5" rows="5" class="form-control" placeholder="Description">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn-success">Update</button>
                            <button class="btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection


