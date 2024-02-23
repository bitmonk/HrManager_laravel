<div class="col-lg-15 order-lg-1">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('payment.update') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="_method" value="PUT">

                <h6 class="heading-small text-muted mb-4">Bank information</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="b_name">Bank Name<span class="small text-danger">*</span></label>
                                <input type="text" id="b_name" class="form-control" name="b_name" placeholder="Bank Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="accName">Account Name<span class="small text-danger">*</span></label>
                                <input type="text" id="accName" class="form-control" name="acc_name" placeholder="Account Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="form-control-label" for="acc_no">Account Number<span class="small text-danger">*</span></label>
                                <input type="text" id="acc_no" class="form-control" name="acc_no" placeholder="Your Account Numeber">
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