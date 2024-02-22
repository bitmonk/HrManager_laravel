<!-- admin.view.blade.php -->

@extends('layouts.admin')

@section('main-content')
<div class="card shadow mb-4">
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="card-img-top" alt="Not Found">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">Email: {{$user->email}}</p>
                        <p class="card-text">{{$user->position->position}}</p>
                        <p class="card-text">Joined: {{$user->join_date}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-4">Personal Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Health Condition:</strong> {{$user->health_condition}}</li>
                            <li class="list-group-item">
                                <strong>Permanent Address:</strong> 
                                {{$user->$permanentAddress->city}}, 
                                {{$permanentAddress->street}}, 
                                {{$permanentAddress->district}}, 
                                {{$permanentAddress->zipcode}}
                            </li>
                            <li class="list-group-item">
                                <strong>Temporary Address:</strong> 
                                {{$temporaryAddress->city}}, {{$temporaryAddress->street}}, {{$temporaryAddress->district}}, {{$temporaryAddress->zipcode}}
                            </li>
                            {{-- <li class="list-group-item">
                                <strong>Emergency Contact:</strong> 
                                Name: {{$emergency->name}}, Relation: {{$emergency->relation}}, Phone Number: {{$emergency->phone1}}
                            </li>
                            <li class="list-group-item"><strong>Level:</strong> {{$user->level}}</li>
                            <li class="list-group-item"><strong>Salary Type:</strong> {{$user->salary_type}}</li>
                            <li class="list-group-item"><strong>Salary Amount:</strong> {{$user->salary_amount}}</li>
                            <!-- Add more personal details as needed --> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
