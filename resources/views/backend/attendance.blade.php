@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">Student Attendance</h4>
                        </div>
                        <div class="col">
                        <h4 class="card-title">Date:&nbsp; <span id="currentDate"></span></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">Class Teacher:&nbsp;&nbsp;Rutuparna Panda</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="card-title">Emp_Id:&nbsp;&nbsp; EMP001</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="card-title">Class:&nbsp;&nbsp;1(A)</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <!-- <h1>Teacher</h1> -->
                    </div>
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped datatable align-middle  text-nowrap custom-table m-0">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Roll No</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @if (!empty($managesections))
                                        <?php $sl = 1; ?>
                                        @foreach ($managesections as $managesection)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $students[$managesection->std_name] }}</td>
                                                <td>{{$managesection->roll_no }}</td>
                                                <td>
                                                    <div class="radio">
                                                    <label><input type="radio" name="optradio_{{$managesection->std_name}}" value="P">P</label>
                                                    <label><input type="radio" name="optradio_{{$managesection->std_name}}" value="A">A</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>  
                            </table>
                        </div>
                    </div>
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-success" id="submitAttendance">Submit</button>
                        </div>
                    <!-- Modal Add Contact -->
                                        <!-- Modal Confirmation -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirm Attendance Submission</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to submit the Attendance?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="confirmSubmitAttendance">Yes, Submit</button>
                        </div>
                        </div>
                    </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Container ends -->
    

@endsection
@section('scripts')

<script>
    // Get current date
    var currentDate = new Date();

    // Format the date as desired
    var formattedDate = currentDate.toLocaleDateString(); // Change format as needed

    // Display the formatted date in the specified element
    document.getElementById("currentDate").innerHTML = formattedDate;
</script>
<script>
$(document).ready(function(){
    // Check if the submission date is stored in local storage
    var lastSubmissionDate = localStorage.getItem('lastSubmissionDate');
    var currentDate = new Date().toDateString();

    if (lastSubmissionDate && lastSubmissionDate === currentDate) {
        $('#submitAttendance').prop('disabled', true); // Disable the button if already submitted today
    }

    $('#submitAttendance').on('click', function(){
        // Show confirmation modal
        $('#confirmationModal').modal('show');
    });

    // When user confirms submission
    $('#confirmSubmitAttendance').on('click', function() {
        // Dismiss the modal
        $('#confirmationModal').modal('hide');

        if (lastSubmissionDate !== currentDate) {
            var data = [];
            // Loop through each row in the table
            $('table tbody tr').each(function(){
                var rowData = {
                    'student_name': $(this).find('td:eq(1)').text(),
                    'roll_no': $(this).find('td:eq(2)').text(),
                    'status': $(this).find('input[type="radio"]:checked').val()
                };
                data.push(rowData);
            });

            // Send AJAX request
            $.ajax({
                url: "{{ url('attendance/save') }}/", // Change this to your PHP script URL
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in headers
                },
                data: {attendanceData: JSON.stringify(data)},
                success: function(response){
                    // Handle success response
                    console.log(response);
                    alert('Attendance saved successfully');
                    $('#submitAttendance').prop('disabled', true); // Disable the button
                    localStorage.setItem('lastSubmissionDate', currentDate); // Store the submission date
                },
                error: function(xhr, status, error){
                    // Handle error
                    console.error(error);
                    alert('Error saving attendance');
                }
            });
        }
    });
});
</script>



@endsection
