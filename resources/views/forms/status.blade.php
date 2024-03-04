<div class="col-lg-15 order-lg-1">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Status</h6>
        </div>
        
        <div class="card-body">

            <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="_method" value="PUT">

                <h6 class="heading-small text-muted mb-4">User information</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="position">
                                    Current Position: 
                                    @if($user->position_id == 1)
                                        Super Admin
                                    @elseif($user->position_id == 2)
                                        Department Head
                                    @elseif($user->position_id == 3)
                                        Team Leader
                                    @elseif($user->position_id == 4)
                                        Employee
                                    @else
                                        Unassigned
                                    @endif
                                </label>
                                                                {{-- <div class="container">
                                    <select class="form-control" id="dropdownOptions" aria-label="Select an Option">
                                        <option selected disabled>Super Admin</option>
                                        <option value="option1">Super Admin</option>
                                        <option value="option2">Department Admin</option>
                                        <option value="option3">Team Lead</option>
                                        <option value="option4">Employee</option>
                                    </select>
                                </div> --}}

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                {{-- <label class="form-control-label" for="level">Level : {{$levelId}}</label> --}}
                                <label class="form-control-label" for="level">
                                    Level:
                                    @if($user->level_id == 1)
                                        Intern
                                    @elseif($user->level_id == 2)
                                        Trainee
                                    @elseif($user->level_id == 3)
                                        Junior
                                    @elseif($user->level_id == 4)
                                        Midlevel
                                    @elseif($user->level_id == 5)
                                        Senior
                                    {{-- @elseif($user->level ==null)
                                        Unassigned --}}
                                    @else
                                    Unassigned
                                        
                                    @endif
                                </label>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Join Date :  {{$user->join_date}}</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" >Contract Duration :{{$user->contract_duration}}  </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label">Contract History :</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label">Time Schedule:</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label">
                                    Salary Type:
                                    @if($user->salary_type == 1)
                                        Monthly
                                    @elseif($user->salary_type == 2)
                                        Weekly
                                    @elseif($user->salary_type == 3)
                                        Project-Based
                                    @else
                                        Unassigned
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label">Salary Amount : {{$user->salary}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>