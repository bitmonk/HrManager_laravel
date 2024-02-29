@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#form1">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2" data-toggle="tab" href="#form2">Leave Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3" data-toggle="tab" href="#form3">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab4" data-toggle="tab" href="#form4">Payments</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="form1">
                @include('admin.users') 
            </div>

            <div class="tab-pane fade" id="form2">
                @include('leave-admin') 

            </div>

            <div class="tab-pane fade" id="form3">
                @include('forms.status')
            </div>
            <div class="tab-pane fade" id="form4">
                @include('forms.payment') 
            </div>



            
        </div>
        
    </div>

    <script>
        // Add JavaScript logic to switch between tabs
        $('#myTabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    </script>

@endsection
