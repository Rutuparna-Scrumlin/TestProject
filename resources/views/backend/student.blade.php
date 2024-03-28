@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Students</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick='showAdd()'  data-bs-target="#studentModal" id="addNewButton"> Add New</button>
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
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                               
                                   
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->
                    <div class="modal fade" id="studentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="Userform" id="Userform">
                                <input type="hidden" id="saveurl" value="student/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage Student
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close" onclick="closePage()"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-12">
                                        <div class="row">
                                                <div class="col-6">
                                                    
                                                    <div class="mb-3">
                                                        <label for="emp_id" class="form-label">Employee ID <span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Enter Your Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Full Name <span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email<span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="phone_no" class="form-label">Phone No<span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="text" class="form-control" id="phone_no" name="phone_no" maxlength="10" placeholder="Enter Mobile No">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender<span style='color:red' title='mandatory feild'>*</label>
                                                        <select class="form-select" aria-label="gender" id='gender' name="gender">
                                                        <option value=" ">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Transgender">Transgender</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="dob" class="form-label">DOB<span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Your DOB">
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
                                                        <label for="join_dt" class="form-label">Date of Joining <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="date" class="form-control" id="join_dt" name="join_dt" placeholder="Enter the Joining Date">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="adhar_no" class="form-label">Aadhaar No <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="text" class="form-control" id="adhar_no" name="adhar_no" maxlength="12" placeholder="Enter Aadhaar No">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="pan_no" class="form-label">PAN No <span style='color:red' title='mandatory feild'>*</span></label>
                                                        <input type="text" class="form-control" id="pan_no" name="pan_no"  placeholder="Enter PAN No">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="uan_no" class="form-label">UAN No </label>
                                                        <input type="text" class="form-control" id="uan_no" name="uan_no" maxlength="12" placeholder="Enter UAN No">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address<span style='color:red' title='mandatory feild'>*</label>
                                                        <textarea class="form-control" name="address" id="address" row="1" placeholder="Enter Your Name" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" aria-label="status" id='status' name="status">
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closePage()">
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

    function closePage() {
        location.reload();
    }
    function getDigitSum(number) {
                    var sum = 0;
                    for (var i = 0; i < number.length; i++) {
                        sum += parseInt(number[i]);
                    }
                    return sum;
    }
    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });

        $('#emp_id').on('change', function() {
            var teacherRegex = /^[A-Z0-9]+$/;
            var teacher = $(this).val();

            if (!teacherRegex.test(teacher)) {
                $('#error').html('!!Please Enter a Valid Employee ID (Uppercase Alphabets and Numbers Only).');
                return;
            } else {
                $('#error').html('');
            }
        });

        $('#emp_id').on('input', function() {
            $('#error').html('');
        });

        $('#name').on('change',function(){
            
            var nameRegex = /^[A-Za-z\s]+$/;
            var name = $(this).val();
            if(!nameRegex.test(name)){
                $('#error').html('!!Please Enter A Valid Name.');
                return;
            }else{
                $('#error').html('');
            }

        });
        $('#name').on('input',function(){
            $('#error').html('');
        })

        $('#dob').on('change',function(){
            var dob =new Date($("#dob").val());
            var currentDate = new Date();
            //alert($('#age').val());
            if(dob > currentDate){
                $("#error").html("!! Date of Birth should not exceed current date");
                return false;
            }
        });
        $('#dob').on('input',function(){
            $('#error').html('');
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
         $('#phone_no').on('change',function(){
            var phone = $('#phone_no').val();
                // function getDigitSum(number) {
                //     var sum = 0;
                //     for (var i = 0; i < number.length; i++) {
                //         sum += parseInt(number[i]);
                //     }
                //     return sum;
                // }
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
        $('#phone_no').on('input',function(){
            $('#error').html(''); 
        });
        $('#join_dt').on('change',function(){
            var dob =new Date($("#join_dt").val());
            var currentDate = new Date();
            //alert($('#age').val());
            if(dob > currentDate){
                $("#error").html("!! Joining Date should not exceed current date");
                return false;
            }
        });
        $('#join_dt').on('input',function(){
            $('#error').html('');
        });

        $('#adhar_no').on('change', function() {
            var adhar = $("#adhar_no").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
            $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number.");
            } else {
            $("#error").html(""); // Clear error message if email is valid
            }
         });
         $('#adhar_no').on('input', function() {
            $("#error").html(""); // 
         });


        $('#pan_no').on('change',function(){
            var idValue = $('#pan_no').val();
            var alphaNumericRegex = /^[A-Z][A-Z0-9]+$/;
            if (!alphaNumericRegex.test(idValue) || idValue.length !== 10 || !idValue.match(/^[A-Z].*[A-Z]$/)) {
                $('#error').html("Invalid Pan ID Number !! Please Check your Pan ID Correctly");
            } else {
                $('#error').html(""); // Clear error message if ID is valid
            }
        });
        $('#pan_no').on('input', function() {
            $("#error").html(""); // 
         });




        $("#Userform").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById('Userform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#emp_id').val()==""||$('#name').val()==""||$('#email').val()==""||$('#phone_no').val()==""||$('#gender').val()==""||
               $('#dob').val()==""||$('#qualification').val()==""||$('#deg_name').val()==""|| $('#join_dt').val()==""||$('#adhar_no').val()==""||$('#pan_no').val()==""||$('#address').val()==""||
                $('#status').val()==""){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
                    return;
            }

        
        
            
            var nameRegex = /^[A-Za-z\s]+$/;
            var name = $('#name').val();
            if(!nameRegex.test(name)){
                $('#error').html('!!Please Enter A Valid Name.');
                return;
            }

       
       
            var dob =new Date($("#dob").val());
            var currentDate = new Date();
            //alert($('#age').val());
            if(dob > currentDate){
                $("#error").html("!! Date of Birth should not exceed current date");
                return false;
            }
       
        
            var email = $("#email").val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
             $("#error").html("Please enter a valid mail ID");
            } 
       
            var phone = $('#phone_no').val();
                // function getDigitSum(number) {
                //     var sum = 0;
                //     for (var i = 0; i < number.length; i++) {
                //         sum += parseInt(number[i]);
                //     }
                //     return sum;
                // }
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

            var dob =new Date($("#join_dt").val());
            var currentDate = new Date();
            //alert($('#age').val());
            if(dob > currentDate){
                $("#error").html("!! Joining date should not exceed current date");
                return false;
            }
       
        
        
            var adhar = $("#adhar_no").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
                $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number.");
                return false;
            }
         


         
            var idValue = $('#pan_no').val();
            var alphaNumericRegex = /^[A-Z][A-Z0-9]+$/;
            if (!alphaNumericRegex.test(idValue) || idValue.length !== 10 || !idValue.match(/^[A-Z].*[A-Z]$/)) {
                $('#error').html("Invalid Pan ID Number !! Please Check your Pan ID Correctly");
                return false;
            } 
       
      


        // $('#uan_no').on('change', function() {
        //     var uan = $("#uan_no").val();
        //     var uanRegex = /^\d{12}$/;

        //     if (!uanRegex.test(uan)) {
        //     $("#error").html("Invalid UAN No. Please enter a valid 12-digit UAN number.");
        //     } else {
        //     $("#error").html(""); // Clear error message if email is valid
        //     }
        //  });
        //  $('#uan_no').on('input', function() {
        //     $("#error").html(""); // 
        //  });

           
            $.ajax({
                type: "POST",
                url: $("#saveurl").val(),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if(response.message == "ERROR!! User Name Or Email or Adhar or Pan or UAN already exist"){
                        $('#error').html(response.message).slideDown();
                        setTimeout(function() {
                        $('#error').slideUp();
                        }, 4000);
                        
                    }else{
                        $('#success').html(response.message).slideDown();
                        document.getElementById('Userform').reset();
                        setTimeout(function() {
                            $('#success').slideUp();
                        }, 2000);
                    }
                    fetch('/staff/getid')
                        .then(response => response.text())
                        .then(newId => {
                            $('#emp_id').val(newId);
                        });
                
                        
                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! User Name Or Email or Adhar or Pan or UAN already exist"){
                        $('#error').html(response.message).slideDown();
                        setTimeout(function() {
                        $('#error').slideUp();
                        }, 4000);
                    }else if(response.message == "Warning Staff Active on User Page"){
                        alert(response.message);
                    }
                    else{
                        location.reload();
                    }
                }

            },
            });
        });
    });

    function showAdd() {
        fetch('/staff/getid')
            .then(response => response.text())
            .then(newId => {
                $('#emp_id').val(newId);
            });
        document.getElementById("Userform").reset();
        document.getElementById("mode").value = "add";
        document.getElementById("recordid").value = "";
        $('#department').empty();
    }


   
    function showEdit(id) {
        document.getElementById("Userform").reset();
        document.getElementById("mode").value = "edit";
        document.getElementById("recordid").value = id;

        $.ajax({
            url: "{{ url('staff/edit') }}/" + id,
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
                document.getElementById("gender").value = data[0].gender;
                document.getElementById("dob").value = data[0].dob;
                document.getElementById("qualification").value = data[0].qualification;
                document.getElementById("deg_name").value = data[0].deg_name;
                document.getElementById("join_dt").value = data[0].join_dt;
                document.getElementById("adhar_no").value = data[0].adhar_no;
                document.getElementById("pan_no").value = data[0].pan_no;
                document.getElementById("uan_no").value = data[0].uan_no;
                document.getElementById("address").value = data[0].address;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }
</script>

@endsection
