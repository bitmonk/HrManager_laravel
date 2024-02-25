<!-- admin.view.blade.php -->

@extends('layouts.admin')

@section('main-content')
<!-- admin.view.blade.php -->

<div class="card shadow mb-4">
    
    <!-- Add Tabs -->
    <ul class="nav nav-tabs d-flex">
        <li class="nav-item">
            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal">Personal Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="work-tab" data-toggle="tab" href="#work">Work Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank">Bank Details</a>
        </li>
    
        <a href="{{ route('about') }}" class="btn btn-link text-danger ml-auto">
            <i class="fas fa-times"></i>
        </a>
    </ul>
    
    

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-15">
                <div class="tab-content">
                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="personal">
                        <div class="card-body">
                            <h5 class="card-title mt-2">Personal Details</h5>
                            <ul class="list-group">
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
                                                                {{$user->permanentAddress->city}}, 
                                                                {{$user->permanentAddress->street}}, 
                                                                {{$user->permanentAddress->district}}, 
                                                                {{$user->permanentAddress->zipcode}}, 
                                                            </li>
                                                            <li class="list-group-item">
                                                                <strong>Temporary Address:</strong> 
                                                                {{$city}}, 
                                                                {{$street}},
                                                                 {{$district}}, 
                                                                 {{$zipcode}}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <strong>Emergency Contact:</strong> 
                                                                Name: {{$emergencyContactName}}, Relation: {{$emergencyContactRelation}}, Phone Number: {{$emergencyContactPhone}}
                                                            </li>
                                                            <li class="list-group-item"><strong>Level:</strong> {{$levelName}}</li>
                                                            <li class="list-group-item"><strong>Salary Type:</strong> {{$salaryType}}</li>
                                                            <li class="list-group-item"><strong>Salary Amount:</strong> {{$amount}}</li>
                                                            <!-- Add more personal details as needed -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>

                    <!-- Work Details Tab -->
                    <div class="tab-pane fade" id="work">
                        <div class="card-body">
                            <h5 class="card-title mt-4">Work Details</h5>
                            <!-- Add Work Details here -->
                        </div>
                    </div>

                    <!-- Bank Details Tab -->
                    <div class="tab-pane fade" id="bank">
                        <div class="card-body">
                            <h5 class="card-title mt-4">Bank Details</h5>
                            <!-- Add Bank Details here -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add JavaScript to switch tabs -->
<script>
    $(document).ready(function(){
        $('#personal-tab').click(function(){
            $('#personal-tab').addClass('active');
            $('#work-tab, #bank-tab').removeClass('active');
            $('#personal').addClass('show active');
            $('#work, #bank').removeClass('show active');
        });

        $('#work-tab').click(function(){
            $('#work-tab').addClass('active');
            $('#personal-tab, #bank-tab').removeClass('active');
            $('#work').addClass('show active');
            $('#personal, #bank').removeClass('show active');
        });

        $('#bank-tab').click(function(){
            $('#bank-tab').addClass('active');
            $('#personal-tab, #work-tab').removeClass('active');
            $('#bank').addClass('show active');
            $('#personal, #work').removeClass('show active');
        });
    });
</script>

@endsection
