@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Teachers</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick='showAdd()'  data-bs-target="#exampleModal" id="addNewButton"> Add New</button>
                    </div>
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped datatable align-middle  text-nowrap custom-table m-0">
                                <thead class="table-success">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>PhoneNo</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($teachers))
                                        <?php $sl = 1; ?>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->phone_no }}</td>
                                                <td>{{ $teacher->subject}}</td>
                                                <td>{!! $teacher->status == 'Active'
                                                    ? "<span class='status-btn success-btn'>Active</span>"
                                                    : "<span class='status-btn danger-btn'>Inactive</span>" !!}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href='#' class='editbtn' onclick='showEdit({{ $teacher->id }})'
                                                            title='Edit'><img src='assets/images/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('teacher/delete') }}/{{ $teacher->id }}')"
                                                            title='Delete'><img src='assets/images/delete.svg'
                                                                style='height:23px; width:23px' /></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                   
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="Userform" id="Userform">
                                <input type="hidden" id="saveurl" value="teacher/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage Teacher
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="emp_id" class="form-label">Employee ID <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Enter Employee ID">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label"> Name <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="phone_no" class="form-label">Phone No <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone No">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="subject" class="form-label">Subject <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="join_dt" class="form-label">Date of Joining <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="date" class="form-control" id="join_dt" name="join_dt" placeholder="Enter the Joining Date">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <select class="form-control" aria-label="gender" id='gender' name="gender">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Transgender">Transgender</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="qualification" class="form-label">Qualification <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter Qualification">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-control" aria-label="status" id='status' name="status">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                                </form>
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
      $('#name').on('change',function(){
            var nameRegex = /^[A-Za-z\s]+$/;
            if (!nameRegex.test($("#name").val())) {
                $("#error").html("Please Enter a Valid Name!! Only Alphabets Allowed.");
                return false;
            }
        });
        $('#name').on('input', function() {
            $('#error').html(''); // Clear the error message on input/correction
        });

        $('#email').on('change', function() {
            var email = $("#email").val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
            $("#error").html("Please enter a valid mail ID");
            } else {
            $("#error").html(""); // Clear error message if email is valid
            }
         });
        $('#email').on('input',function(){
            $('#error').html(''); 
         });
         $('#phoneno').on('change',function(){
            var phone = $('#phoneno').val();
                function getDigitSum(number) {
                    var sum = 0;
                    for (var i = 0; i < number.length; i++) {
                        sum += parseInt(number[i]);
                    }
                    return sum;
                }
                var phoneRegex = /^\d+$/;
                if (!phoneRegex.test(phone)) {
                    $("#error").html("Please enter a valid Mobile number (only digits allowed).");
                    return false;
                }
                if (getDigitSum(phone) === 0) {
                    $("#error").html("Please enter a valid Mobile number.");
                    return false;
                }
                if (phone.length < 10 || phone.length === 11) {
                    $("#error").html("The Mobile number should be at least 10 digits long");
                    return false;
                }
                var firstDigit = parseInt(phone.charAt(0));
                if (firstDigit >= 0 && firstDigit <= 5) {
                    $("#error").html("Please Enter a Valid Mobile Number");
                    return false;
                }

        });
        $('#phoneno').on('input',function(){
            $('#error').html(''); 
        });
        $('#pan_no').on('input',function(){
            var idValue = $('#pan_no').val();
            var alphaNumericRegex = /^[A-Z][A-Z0-9]+$/;
            if (!alphaNumericRegex.test(idValue) || idValue.length !== 10 || !idValue.match(/^[A-Z].*[A-Z]$/)) {
                $('#error').html("Invalid Pan ID Number !! Please Check your Pan ID Correctly");
            } else {
                $('#error').html(""); // Clear error message if ID is valid
            }
        });
       
        
    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });

        $("#userform").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById('userform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#name').val()==""||
                $('#email').val()==""||
                $('#phoneno').val()==""||$('#qualifications').val()==""||
                $('#status').val()==""){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
                    return;
            }
            var nameRegex = /^[A-Za-z\s]+$/;
            if (!nameRegex.test($("#name").val())) {
                $("#error").html("Please Enter a Valid Name!! Only Alphabets Allowed.");
                return false;
            }
            
            var email = $("#email").val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                $("#error").html("Please enter a valid mail ID");
                return;
            } 
            var phone = $('#phoneno').val();
                function getDigitSum(number) {
                    var sum = 0;
                    for (var i = 0; i < number.length; i++) {
                        sum += parseInt(number[i]);
                    }
                    return sum;
                }
                var phoneRegex = /^\d+$/;
                if (!phoneRegex.test(phone)) {
                    $("#error").html("Please enter a valid Mobile number (only digits allowed).");
                    return false;
                }
                if (getDigitSum(phone) === 0) {
                    $("#error").html("Please enter a valid Mobile number.");
                    return false;
                }
                if (phone.length < 10 || phone.length === 11) {
                    $("#error").html("The Mobile number should be at least 10 digits long");
                    return false;
                }
                var firstDigit = parseInt(phone.charAt(0));
                if (firstDigit >= 0 && firstDigit <= 5) {
                    $("#error").html("Please Enter a Valid Mobile Number");
                    return false;
                }
              
                // Clear any previous error messages
                fileError.textContent = '';

            $.ajax({
                type: "POST",
                url: $("#saveurl").val(),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    alert(response.message);
                    document.getElementById('Userform').reset();
                },
                error: function() {
                    alert("Error saving data.");
                }
            });
        });
    });

    function showAdd() {
        document.getElementById("Userform").reset();
        document.getElementById("mode").value = "add";
        document.getElementById("recordid").value = "";
        $('#department').empty();
    }


    function show(){
        alert(1);
    }
    function showEdit(id) {
        document.getElementById("Userform").reset();
        document.getElementById("mode").value = "edit";
        document.getElementById("recordid").value = id;

        $.ajax({
            url: "{{ url('teacher/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Assuming you have the Bootstrap modal with ID 'exampleModal'
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                document.getElementById("emp_id").value = data[0].emp_id;
                document.getElementById("name").value = data[0].name;
                document.getElementById("email").value = data[0].email;
                document.getElementById("phone_no").value = data[0].phone_no;
                document.getElementById("subject").value = data[0].subject;
                document.getElementById("join_dt").value = data[0].join_dt;
                document.getElementById("gender").value = data[0].gender;
                document.getElementById("qualification").value = data[0].qualification;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }
</script>
<script>
   
</script>


@endsection
