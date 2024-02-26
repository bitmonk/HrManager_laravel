@extends('layouts.admin')

@section('main-content')
<div class="container mt-5">
    <h2>Edit Form</h2>
    <form>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-group">
                <label for="position">Position:</label>
                <select class="form-control" id="position" name="position">
                    <option value="1">Super Admin</option>
                    <option value="2">Department Head</option>
                    <option value="3">Team Leader</option>
                    <option value="4">Employee</option>
                </select>
            </div>

            <a href="{{ route('about') }}" class="btn btn-link text-danger ml-2"> <!-- Adjusted margin here -->
                <i class="fas fa-times"></i>
            </a>
        </div>
        <div class="form-group">
            <label for="level">Level:</label>
            <select class="form-control" id="level" name="level">
                <option value="1">Intern</option>
                <option value="2">Trainee</option>
                <option value="3">Junior</option>
                <option value="4">Mid Level</option>
                <option value="5">Senior</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="salaryType">Salary Type:</label>
            <select class="form-control" id="salaryType">
                <option>Hourly</option>
                <option>Monthly</option>
                <option>Project Based</option>
            </select>
        </div>

        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="text" class="form-control" id="salary" placeholder="Enter salary (In Rs)">
        </div>

        <div class="form-group">
            <label for="assignedTask">Assigned Task:</label>
            <textarea class="form-control" id="assignedTask" rows="3" placeholder="Enter assigned task"></textarea>
        </div>

        <div class="form-group">
            <label for="contractDuration">Contract Duration:</label>
            <input type="text" class="form-control" id="contractDuration" placeholder="Enter contract duration">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection