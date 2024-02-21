@extends('layouts.admin')

@section('main-content')
<h3>PUNCH IN</h3>
<br>


{{-- Punch in punch out --}}


@if(Auth::user()->punchIns()->where('user_id', Auth::id())->whereNull('punch_out_time')->count() == 0)

<div class="punch_in">
    <form id="punchInForm" action="{{ route('punch.in') }}" method="POST">
        @csrf

        <textarea name="to_do" rows="10" cols="80" placeholder="Enter your to-do list here"></textarea><br>

        @error('to_do')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button id="punchInButton" type="submit" class="btn btn-primary" style="color: white; background-color: green">{{ __('Punch In') }}
            
        </button>
    </form>
</div>
<br>
@endif


@if(Auth::user()->punchIns->whereNotNull('punch_in_time')->whereNull('punch_out_time')->count() > 0)
    {{-- Punch Out form --}}
    <div class="punch_out">
        <form id="punchOutForm" action="{{ route('punch.out') }}" method="POST">
            @csrf
            <textarea name="task_completed" rows="10" cols="80" placeholder="Enter how much task is completed"></textarea><br>

            @error('task_completed')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button id="punchOutButton" type="submit" class="btn btn-primary" style="color: white; background-color: green">{{ __('Punch Out') }}</button>
        </form>
    </div>
@endif



@endsection

 