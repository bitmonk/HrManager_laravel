<div class="col-lg-15 order-lg-1">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Additional Information</h6>
        </div>
        
{{$address}}
        
        <div class="card-body">

            <form method="POST" action="{{ route('additional.temp') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="_method" value="PUT">

                <h6 class="heading-small text-muted mb-4">Current Address</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="district">District<span class="small text-danger">*</span></label>
                                <input type="text" id="district" class="form-control" name="district" placeholder="District" value="{{ old('district', $address ? $address->district : '') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="city">VDC / Municipality<span class="small text-danger">*</span></label>
                                <input type="text" id="city" class="form-control" name="city" placeholder="City" value="{{ old('city', $address ? $address->city : '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="street">Street Address<span class="small text-danger">*</span></label>
                                <input type="text" id="street" class="form-control" name="street" placeholder="example@example.com" value="{{ old('tole', $address ? $address->tole : '') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="ward">Ward No.<span class="small text-danger">*</span></label>
                                <input type="text" id="current_password" class="form-control" name="ward" placeholder="Ward No." value="{{ old('ward_no', $address ? $address->ward_no : '') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="zipcode">Zip Code</label>
                                <input type="text" id="zipcode" class="form-control" name="zipcode" placeholder="Zip Code" value="{{ old('zipcode', $address ? $address->zipcode : '') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="confirm_password">Zone</label>
                                <input type="text" id="zone" class="form-control" name="zone" placeholder="Zone" value="{{ old('zone', $address ? $address->zone : '') }}" >
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
    
    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="POST" action="{{route('additional.per')}}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="_method" value="PUT">

                <h6 class="heading-small text-muted mb-4">Permanent Address</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="district">District<span class="small text-danger">*</span></label>
                                <input type="text" id="district" class="form-control" name="district" placeholder="District" value="{{ old('district', $address ? $address->district : '') }}">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="city">VDC / Municipality<span class="small text-danger">*</span></label>
                                <input type="text" id="city" class="form-control" name="city" placeholder="City" value="{{ old('city', $address ? $address->city : '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="street">Street Address<span class="small text-danger">*</span></label>
                                <input type="text" id="street" class="form-control" name="street" placeholder="example@example.com" value="{{ old('tole', $address ? $address->tole : '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="ward">Ward No.<span class="small text-danger">*</span></label>
                                <input type="text" id="current_password" class="form-control" name="ward" placeholder="Ward No." value="{{ old('ward_no', $address ? $address->ward_no : '') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="zipcode">Zip Code</label>
                                <input type="text" id="zipcode" class="form-control" name="zipcode" placeholder="Zip Code" value="{{ old('zipcode', $address ? $address->zipcode : '') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="confirm_password">Zone</label>
                                <input type="text" id="zone" class="form-control" name="zone" placeholder="Zone" value="{{ old('zone', $address ? $address->zone : '') }}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check pl-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Same as temporary address
                    </label>
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
    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="POST" action="{{ route('emergency.update') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="_method" value="PUT">

                <h6 class="heading-small text-muted mb-4">Emergency Contact</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', $emergency_contact ? $emergency_contact->name : '') }}" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="relation">Relation<span class="small text-danger">*</span></label>
                                <input type="text" id="relation" class="form-control" name="relation" placeholder="Relation" value="{{ old('relation', $emergency_contact ? $emergency_contact->relation : '') }}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone1">Phone No<span class="small text-danger">*</span></label>
                                <input type="text" id="phone1" class="form-control" name="phone1" placeholder="+977 " value="{{ old('phone1', $emergency_contact ? $emergency_contact->phone1 : '') }}" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone2">Secondary Phone No</label>
                                <input type="text" id="phone2" class="form-control" name="phone2" placeholder="+977 " value="{{ old('phone2', $emergency_contact ? $emergency_contact->phone2 : '') }}" >
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