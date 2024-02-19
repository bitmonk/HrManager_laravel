@extends('layouts.admin')

@section('main-content')
<h3>PUNCHIN</h3>
<br>


{{-- Punch in punch out --}}
<div class="punch_in">
    <form id="punchInForm" action="{{ route('punch.in') }}" method="POST">
        @csrf

        <textarea name="to_do" rows="4" cols="50" placeholder="Enter your to-do list here"></textarea><br>

        @error('to_do')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button id="punchInButton" type="submit" class="btn btn-primary" style="color: white; background-color: green">{{ __('Punch In') }}
            
        </button>
    </form>
</div>
<br>

<div class="punch_out">
    <form id="punchOutForm" action="{{ route('punch.out') }}" method="POST">
        @csrf
        <textarea name="task_completed" rows="4" cols="50" placeholder="Enter how much task is completed"></textarea><br>

        @error('task_completed')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button id="punchOutButton" type="submit" class="btn btn-primary" style="color: white; background-color: green">{{ __('Punch Out') }}</button>
    </form>
</div>


@endsection

 