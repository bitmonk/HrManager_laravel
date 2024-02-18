<div class="col-lg-15 order-lg-1">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
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
                                <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Last name</label>
                                <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', Auth::user()->last_name) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone1">Phone Number<span class="small text-danger">*</span></label>
                                <input type="text" id="phone1" class="form-control" name="phone1" placeholder="+977" >
                            </div>
                        </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="phone2">Secondary Phone Number<span class="small text-danger">*</span></label>
                            <input type="text" id="phone2" class="form-control" name="phone2" placeholder="+977 ">
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-5">
                        <label for="bloodGroup" class="form-control-label">Select Blood Group:</label>
                        <select class="form-control" id="bloodGroup" aria-label="Select Blood Group">
                            <option selected disabled>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label class="form-control-label" for="health">Health Condition</label>
                            <input type="text" id="health" class="form-control" name="health" placeholder="How are you feeling ?">
                        </div>
                    </div>

                    </div>
                    
                        

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="current_password">Current password</label>
                                <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Current password">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="new_password">New password</label>
                                <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New password">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="confirm_password">Confirm password</label>
                                <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirm password">
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