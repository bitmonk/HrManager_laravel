@extends('layouts.admin')

@section('main-content')
    <div class="container mt-4">
        <h2 class="mb-4">Create Task</h2>
        <form action="{{ route('taskstore') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="task">Task:</label>
                <input type="text" class="form-control" id="task" name="task" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority:</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="assigned_person">Assign Person:</label>
                <select class="form-control" id="assigned_person" name="assigned_person" required>
                      <option value="superadmin">Super Admin</option>
                    <option value="departmentadmin">DepartmentAdmin</option>
                    <option value="teamlead">Team Lead</option>
                </select>  
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Create Task</button>
        </form>

        <hr class="mt-4">

        <h2 class="mb-4">Task List</h2>
        <ul class="list-group">
            @forelse($tasks as $task)
                <li class="list-group-item">{{ $task->task }} - {{ $task->description }}</li>
            @empty
                <li class="list-group-item">No tasks yet.</li>
            @endforelse
        </ul>
    </div>
@endsection