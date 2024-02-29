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
                <a class="nav-link" id="tab4" data-toggle="tab" href="#form4">User Logs</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="form1">
                @include('admin.users') 
            </div>

            <div class="tab-pane fade" id="form2">
                @include('admin.leave-admin') 

            </div>

            <div class="tab-pane fade" id="form3">
                {{-- @include('forms.status') --}}
            </div>
            <div class="tab-pane fade" id="form4">
                @include('admin.activity-log-admin') 
            </div>

        </div>
        
    </div>

    <script>
        // Function to add class 'active' to an element
        function setActive(elementId) {
            var element = document.getElementById(elementId);
            if (element) {
                element.classList.add('active');
            }
        }
    
        // Function to show and add class 'active' to an element
        function showAndSetActive(elementId) {
            var element = document.getElementById(elementId);
            if (element) {
                element.classList.add('show', 'active');
            }
        }
    
        // Add vanilla JavaScript logic to switch between tabs
        document.addEventListener('DOMContentLoaded', function () {
            // Get the 'tab' parameter from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var activeTab = urlParams.get('tab');
            
            // Remove the 'show' and 'active' classes from all tabs and panes
            var tabs = document.querySelectorAll('.nav-link');
            var panes = document.querySelectorAll('.tab-pane');
            
            tabs.forEach(function (tab) {
                tab.classList.remove('active');
            });
    
            panes.forEach(function (pane) {
                pane.classList.remove('show', 'active');
            });
    
            // Activate the corresponding tab
            if (activeTab) {
                // Add 'active' class to the specified tab and 'show active' classes to the corresponding content pane
                setActive('tab' + activeTab);
                showAndSetActive('form' + activeTab);
            } else {
                // If no 'tab' parameter, show the default tab
                setActive('tab1');
                showAndSetActive('form1');
            }
        });
    </script>
    
    

    

@endsection
