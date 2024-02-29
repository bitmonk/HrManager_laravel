@extends('layouts.admin')

@section('main-content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow pb-5">
<div class="container mt-5">
    <h2>Edit Form</h2>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('POST')
        @csrf
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-group">
                <label for="position">Position:</label>
                <select class="form-control" id="position" name="position">
                    <option value="1" {{ $positionId == 1 ? 'selected' : '' }}>Super Admin</option>
                    <option value="2" {{ $positionId == 2 ? 'selected' : '' }}>Department Head</option>
                    <option value="3" {{ $positionId == 3 ? 'selected' : '' }}>Team Leader</option>
                    <option value="4" {{ $positionId == 4 ? 'selected' : '' }}>Employee</option>
                </select>   
            </div>
            
            <a href="{{ route('about') }}" class="btn btn-link text-danger ml-2"> <!-- Adjusted margin here -->
                <i class="fas fa-times"></i>
            </a>
        </div>
        <div class="form-group">
            <label for="level">Level:</label>
            <select class="form-control" id="level" name="level">
                <option value="1" {{ optional($user->level)->id == 1 ? 'selected' : '' }}>Intern</option>
                <option value="2" {{ optional($user->level)->id == 2 ? 'selected' : '' }}>Trainee</option>
                <option value="3" {{ optional($user->level)->id == 3 ? 'selected' : '' }}>Junior</option>
                <option value="4" {{ optional($user->level)->id == 4 ? 'selected' : '' }}>Mid Level</option>
                <option value="5" {{ optional($user->level)->id == 5 ? 'selected' : '' }}>Senior</option>
            </select>
        </div>
        
        
        
        <div class="form-group">
    <label for="salaryType">Salary Type:</label>
    <input type="text" class="form-control" name="salaryType" value="{{ $salaries->salary_type ?? 'Unassigned' }}" placeholder="Salary Type">    
</div>

        
<div class="form-group">
    <label for="salary">Salary:</label>
    <input type="text" class="form-control" id="salary" name="salary" value="{{ $salaries->salary ?? 'Unassigned' }}" placeholder="Enter salary (In Rs)">
</div>

        <div class="form-group">
            <label for="assignedTask">Assigned Task:</label>
            <select class="form-control" id="assignedTask" name="assignedTask">
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->task_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="contractDuration">Contract Duration:</label>
            <input type="date" class="form-control" id="contractDuration" name="contractDuration" placeholder="Enter contract duration">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection