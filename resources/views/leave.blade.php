@extends('layouts.admin')

@section('main-content')
    <div class="container mt-4">
        <h2 class="mb-4">Apply for Leave </h2>
        <form action="{{ route('taskstore') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="description">Reason for leave:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            Apply for Leave:
            <div class="form-group">
                <label for="deadline">From:</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>
            <div class="form-group">
                <label for="deadline">Till:</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Apply</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Reason for Leave</th>
                    <th>From:</th>
                    <th>Till:</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $leaveRequest->id }}</td>
                    <td>{{ $leaveRequest->name }}</td>
                    <td>{{ $leaveRequest->date }}</td>
                    
                    
                </tr>
            </tbody>
        </table>

        
    </div>
@endsection