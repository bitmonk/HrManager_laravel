@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">

        <div class="container">

            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    <figure class="rounded-circle avatar avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}"></figure>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{  Auth::user()->fullName }}</h5>
                                <p>Administrator</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">22</span>
                                <span class="description">Tasks</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">10</span>
                                <span class="description">Pending</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">12</span>
                                <span class="description">Completed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="container">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#form1">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2" data-toggle="tab" href="#form2">Additional Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3" data-toggle="tab" href="#form3">Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab4" data-toggle="tab" href="#form4">Payments</a>
            </li>
            <!-- Add more tabs as needed -->
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="form1">

                
                @include('forms.profile') <!-- Include your form partial for Tab 1 -->
            </div>
            <div class="tab-pane fade" id="form2">
                @include('forms.additional') <!-- Include your form partial for Tab 2 -->
            </div>
            <div class="tab-pane fade" id="form3">
                @include('forms.status') <!-- Include your form partial for Tab 2 -->
            </div>
            <div class="tab-pane fade" id="form4">
                @include('forms.payment') <!-- Include your form partial for Tab 2 -->
            </div>


            <!-- Add more form partials as needed -->

            
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
