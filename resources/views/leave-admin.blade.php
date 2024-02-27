<<<<<<< HEAD
@extends('layouts.admin')

@section('main-content')
    <div class="container mt-4">
        <h2 class="mb-4">Apply  Leave For ADMIN </h2>
        
=======
    <div class="container mt-4">        
>>>>>>> parbat

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Reason for Leave</th>
                    <th>From:</th>
                    <th>Till:</th>
                    <div>
                        @error('from')
                            <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                        @enderror
                    </div>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveRequests as $leave)

                <tr>
                    
                        <td>{{ $leave->user->name}}</td>
                        <td>{{$leave->reason}}</td>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->till}}</td>
                        <td>{{$leave->status}}</td>

<<<<<<< HEAD
                            {{-- for approve and reject --}}
                            <td> 
                                @if($leave->status== 'pending')
                                <form action="{{ route('leave-admin-approve', $leave->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('leave-admin-reject', $leave->id) }}" method="post"style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                                @else
                                Reviewed
                                @endif
                            </td>
                    </tr>
                @endforeach
=======
                        {{-- for approve and reject --}}
                        <td> 
                            @if($leave->status== 'pending')
                            <form action="{{ route('leave-admin-approve', $leave->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form action="{{ route('leave-admin-reject', $leave->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                            @else
                            Reviewed
                            @endif
                        </td>
                </tr>
            @endforeach
>>>>>>> parbat
            </tbody>
        </table>
    </div>
