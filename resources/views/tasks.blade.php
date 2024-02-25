@extends('layouts.admin')

@section('main-content')
    <div class="container mt-4">
        <div class="head">
            <h2 class="mb-1">Your Tasks</h2>
        <a href="#" data-toggle="modal" data-target="#addModal" class="d-flex btn btn-md btn-primary shadow-sm">
            Create Task</a>
        </div>
        
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif
         
        
        @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
        </div>
    @endif
        

        

        

        {{-- create task modal --}}
        <div class="modal fade" id="addModal" tabindex="-1" role="form" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Create Task</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    
                    <form action="{{ route('taskstore') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="task">Task:</label>
                            <input type="text" class="form-control" id="task" name="task" required>
                            
                             @error('task')
                                 <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                             @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                            @error('description')
                                 <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                             @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="deadline">Deadline:</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" required>
                            @error('deadline')
                                 <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority:</label>
                            <select class="form-control" id="priority" name="priority" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            @error('priority')
                                 <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="assigned_person">Assign Person :</label>
                            <select class="form-control" id="assigned_person" name="assigned_person" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('assigned_person')
                                 <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                             @enderror
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Create Task</button>
                        </div>
                    </form>
                    
            
                </div>
            </div>    

        </div>  

        
        
        

        
        <hr class="mt-4">
        <table class="table">
            <thead style="background-color: #4e73df; color: white;">
                    <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Deadline:</th>
                    <th>Priority</th>
                    <th>Assigned By</th>
                    
                    

                </tr>
            </thead>
            <tbody>

                @forelse ($tasks as $task)
                @if($task->person_assigned == auth()->id()) 
                    <tr>
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->task_description}}</td>
                        <td></td>
                        <td>{{$task->deadline}}</td>
                        <td>{{$task->priority}}</td>
                        @foreach ($users as $user)
                        @if ($user->id==$task->u_id)
                            <td>{{$user->name}}({{$user->position->position}})</td>
                        @endif
                        
                        @endforeach

                        
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="4">No tasks assigned to the currently authenticated user.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        
    </div>
@endsection