<div class="container mt-4">
    <div class="head d-flex justify-content-between align-items-center">
        <h2 class="mb-1">Hurray It's a Holidays</h2>
        <button type="button" id="createHolidayBtn" class="d-flex btn btn-md btn-primary shadow-sm">Create Holiday</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createHolidayModal" tabindex="-1" role="dialog" aria-labelledby="createHolidayModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createHolidayModalLabel">Create Holiday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="from">From:</label>
                            <input type="date" class="form-control" id="from" name="from" required>
                        </div>
                        <div class="form-group">
                            <label for="till">Till:</label>
                            <input type="date" class="form-control" id="till" name="till" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason for holidays:</label>
                            <textarea class="form-control" id="reason" name="reason" required>{{ old('reason') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-4">

    <!-- Your table or other content goes here -->

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Add a click event listener to the "Create Holiday" button
        $("#createHolidayBtn").click(function () {
            // Show the modal
            $("#createHolidayModal").modal("show");
        });
    });
</script>