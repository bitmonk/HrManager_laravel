@extends('layouts.admin')

@section('main-content')
        <h2>Activity log</h2>
        

        <table class="table">
            
            <tbody>
                <thead>
                    <th>Name</th>
                    <th>Punch In Time</th>
                    <th>To Do </th>
                    <th>Punch Out Time</th>
                    <th>Task Completed</th>
                </thead>
                @foreach($punchIns as $log)
                @if($log->user->id === auth()->id())
                    <tr>
                            <td>{{ $log->user->name}}</td>
                            <td>{{$log->punch_in_time}}</td>
                            <td>{{$log->to_do}}</td>
                            <td>{{$log->punch_out_time}}</td>
                            <td>{{$log->task_completed}}</td>
                    </tr>
                @endif
                @endforeach

                
            </tbody>
        </table>
@endsection
