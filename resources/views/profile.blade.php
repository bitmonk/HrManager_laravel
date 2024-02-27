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
            <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-profile-image mt-4">
                    <!-- Display uploaded image -->
                    <img id="profileImage" src="{{asset($user->image) }}" alt="Uploaded Image" class="rounded-circle avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px; cursor: pointer;">
                    
                    <!-- Hidden file input for image upload -->
                    <input type="file" id="uploadInput" name="image" accept="image/*" style="display: none;">
                    <button class="btn btn-primary" type="submit" >Upload Image</button>

                </div>
            </form>


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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
       $(document).ready(function() {
           // Trigger file input click when profile image is clicked
           $('#profileImage').click(function() {
               $('#uploadInput').click(); // Trigger click on file input
           });
   
           // When a new image is selected, display it in the profile image area
           $('#uploadInput').change(function() {
               var input = this;
               if (input.files && input.files[0]) {
                   var reader = new FileReader();
   
                   reader.onload = function(e) {
                       $('#profileImage').attr('src', e.target.result);
                   }
   
                   reader.readAsDataURL(input.files[0]); // Convert to base64 string
               }
           });
       });
   </script>
   
    

@endsection
