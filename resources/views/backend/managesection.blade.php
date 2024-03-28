@extends('layouts.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Section</h4>
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
                                        <th>Class</th>
                                        <th>Student Name </th>
                                        <!-- <th>Photo</th> -->
                                        <th>Section</th>
                                        <th>Roll No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                  
                                </tbody>               
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="Userform" id="Userform">
                                <input type="hidden" id="saveurl" value="managesection/savedata" />
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
                                    <div class="row">
                                            <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                            <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                        <div class="col-xl-12 col-12">
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="cls_name" class="form-label">Class <span style='color:red' title='mandatory feild'>* </label>
                                                        <select class="form-select" aria-label="class" id='cls_name' name="cls_name">
                                                                <option value="">Select Class</option>
                                                            @foreach ($classdetail as $key => $item)
                                                                <option value="{{ $key }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="std_name" class="form-label">Students <span style='color:red' title='mandatory feild'>* </label>
                                                        <select class="form-select" aria-label="class" id='std_name' name="std_name">
                                                         <option value="">Select Student</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="class" class="form-label">Section <span style='color:red' title='mandatory feild'>* </label>
                                                        <select class="form-select" aria-label="class" id='class' name="class">
                                                                <option value="">Select Section</option>
                                                            @foreach ($sections as $key => $item)
                                                                <option value="{{ $key }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">                                                 
                                                    <div class="mb-3">
                                                        <label for="emp_id" class="form-label">Roll No </label>
                                                        <input class="form-control" type="text" name='photo'placeholder="Enter Roll No" id='photo' />
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

                

@endsection
@section('scripts')

<script>
    function getStudentsByClass(classId) {
    // Clear existing options
    var studentsSelect = document.getElementById("std_name");
    studentsSelect.innerHTML = "<option value=''>Select Student</option>";

    if (classId !== "") {
        // Send AJAX request to fetch students by class
        fetch('/getStudentsByClass/' + classId)
            .then(response => response.json())
            .then(data => {
                // Populate student select field with fetched students
                for (var studentId in data) {
                    var option = document.createElement("option");
                    option.value = studentId;
                    option.text = data[studentId];
                    studentsSelect.appendChild(option);
                }
            })
            .catch(error => console.error('Error:', error));
    }
}

</script>

<script>
    $(document).ready(function() {
        $('#same_as_present_address').change(function() {
            if ($(this).is(':checked')) {
                var presentAddress = $('#address').val();
                $('#per_address').val(presentAddress);
            } else {
                $('#per_address').val('');
            }
        });
    });
</script>


<script>    
function closePage() {
        location.reload();
    }


    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });
        $('#std_name').on('change',function(){
            
            var nameRegex = /^[A-Za-z\s]+$/;
            var name = $(this).val();
            if(!nameRegex.test(name)){
                $('#error').html('!!Please Enter A Valid Name.');
                return;
            }else{
                $('#error').html('');
            }

        });
        $('#std_name').on('input',function(){
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

        $('#adhar').on('change', function() {
            var adhar = $("#adhar").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
            $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number.");
            } else {
            $("#error").html(""); // Clear error message if email is valid
            }
         });
         $('#adhar').on('input', function() {
            $("#error").html(""); // 
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
        $('#phone_no').on('input',function(){
            $('#error').html(''); 
        });

        $('#fathers_name').on('change',function(){
            
            var nameRegex = /^[A-Za-z\s]+$/;
            var name = $(this).val();
            if(!nameRegex.test(name)){
                $('#error').html('!!Please Enter A Valid Fathers Name.');
                return false;
            }else{
                $('#error').html('');
            }

        });
        $('#fathers_name').on('input',function(){
            $('#error').html('');
        })

        $('#f_adhar').on('change', function() {
            var adhar = $("#f_adhar").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
            $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number for Father.");
            } else {
            $("#error").html(""); // Clear error message if email is valid
            }
         });
         $('#f_adhar').on('input', function() {
            $("#error").html(""); // 
         });

        $('#mothers_name').on('change',function(){
            
            var nameRegex = /^[A-Za-z\s]+$/;
            var name = $(this).val();
            if(!nameRegex.test(name)){
                $('#error').html('!!Please Enter A Valid Mothers Name.');
                return;
            }else{
                $('#error').html('');
            }

        });
        $('#mothers_name').on('input',function(){
            $('#error').html('');
        })
        $('#m_adhar').on('change', function() {
            var adhar = $("#m_adhar").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
            $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number for Mother.");
            } else {
            $("#error").html(""); // Clear error message if email is valid
            }
         });
         $('#m_adhar').on('input', function() {
            $("#error").html(""); // 
         });

        $("#Userform").submit(function(event) {
            
            event.preventDefault();
            var formData = new FormData(document.getElementById('Userform'));
            formData.append("_token", '{{ csrf_token() }}');

         

            if($('#std_name').val()==""||$('#dob').val()==""||$('#adhar').val()==""||$('#email').val()==""||$('#phone_no').val()==""||
                $('#status').val()==""){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
                    return;
            }

               //..... Aadhaar validation for student father and mother......

            var adhar = $("#adhar").val();
            var f_adhar = $("#f_adhar").val();
            var m_adhar = $("#m_adhar").val();

            if (adhar === f_adhar || adhar === m_adhar || f_adhar === m_adhar) {
                $("#error").html("Aadhaar numbers should be unique for each individual.").show();
                return false;
            } else {
                $("#error").html("").hide(); // Clear and hide error message if Aadhaar numbers are unique
            }

            // ..........Aadhaar Validation........

            
            var nameRegex = /^[A-Za-z\s]+$/;
            var name = $('#std_name').val();
            //alert(name);
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

            var adhar = $("#adhar").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
                $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number.");
                return false;
            }
         

            var email = $("#email").val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
             $("#error").html("Please enter a valid mail ID");
            } 

            // if(validatePh() == false){
            //     $('#error').html('!!!INVALID PH');
            //     return false;
            // }
            // var phone = $('#phone_no').val();
               
            // var phoneRegex = /^\d+$/;
            // if (!phoneRegex.test(phone)) {
            //     $("#error").html("Please enter a valid Mobile number (only digits allowed).");
            //     return false;
            // }
            // if (getDigitSum(phone) === 0) {
            //     $("#error").html("Please enter a valid Mobile number.");
            //     return false;
            // }
            // if (phone.length < 10 || phone.length === 11) {
            //     $("#error").html("The Mobile number should be at least 10 digits long");
            //     return false;
            // }
            // var firstDigit = parseInt(phone.charAt(0));
            // if (firstDigit >= 0 && firstDigit <= 5) {
            //     $("#error").html("Please Enter a Valid Mobile Number");
            //     return false;
            // }

            
            var testRegex = /^[A-Za-z\s]+$/;
            var fname = $('#fathers_name').val();
            if(!testRegex.test(fname)){
                $('#error').html('!!Please Enter A Valid Fathers Name.');
                return false;
            }


            var adharr = $("#f_adhar").val();
            var adharrRegex = /^\d{12}$/;

            if (!adharrRegex.test(adharr)) {
                $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number for Father.");
                return false;
            }

            var nnameRegex = /^[A-Za-z\s]+$/;
            var nname = $('#mothers_name').val();
            if(!nnameRegex.test(nname)){
                $('#error').html('!!Please Enter A Valid Mothers Name.');
                return  false;
            }

            var adhar = $("#m_adhar").val();
            var adharRegex = /^\d{12}$/;

            if (!adharRegex.test(adhar)) {
                $("#error").html("Invalid Aadhar Card. Please enter a valid 12-digit Aadhar number for Mother.");
                return false;
            }

            // var phone = $('#g_phone_no').val();
                
            //     var phoneRegex = /^\d+$/;
            //     if (!phoneRegex.test(phone)) {
            //         $("#error").html("Please enter a valid Mobile number (only digits allowed).");
            //         return false;
            //     }
            //     if (getDigitSum(phone) === 0) {
            //         $("#error").html("Please enter a valid Mobile number.");
            //         return false;
            //     }
            //     if (phone.length < 10 || phone.length === 11) {
            //         $("#error").html("The Mobile number should be at least 10 digits long");
            //         return false;
            //     }
            //     var firstDigit = parseInt(phone.charAt(0));
            //     if (firstDigit >= 0 && firstDigit <= 5) {
            //         $("#error").html("Please Enter a Valid Mobile Number");
            //         return false;
            //     }

            // var email = $("#g_email").val();
            // var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // if (!emailRegex.test(email)) {
            //  $("#error").html("Please enter a valid mail ID");
            //  return false;
            // } 


            $.ajax({
                type: "POST",
                url: $("#saveurl").val(),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if(response.message === "ERROR!! Student Adhaar already exist"){
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

                    if($('#mode').val()=='edit'){
                        if(response.message === "ERROR!! Student Adhaar already exist"){
                            $('#error').html("ERROR!! Student Adhaar already exist").slideDown();
                            setTimeout(function() {
                            $('#error').slideUp();
                            }, 4000);
                        }else{
                            location.reload();
                        }
                    }
                

                

                },
                error:function(){
                    alert('Not Found');
                }
            });
        });
    });

    function showAdd() {
        document.getElementById("Userform").reset();
        document.getElementById("mode").value = "add";
        document.getElementById('reg_date').valueAsDate= new Date();
        document.getElementById("recordid").value = "";
        $('#department').empty();
    }

    function showEdit(id) {
        document.getElementById("Userform").reset();
        document.getElementById("mode").value = "edit";
        document.getElementById("recordid").value = id;

        $.ajax({
            url: "{{ url('student/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Assuming you have the Bootstrap modal with ID 'exampleModal'
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                document.getElementById("std_name").value = data[0].std_name;
                document.getElementById("reg_date").value = data[0].reg_date;
                document.getElementById("reg_no").value = data[0].reg_no;
                document.getElementById("photo").value = data[0].photo;
                document.getElementById("dob").value = data[0].dob;
                document.getElementById("adhar").value = data[0].adhar;
                document.getElementById("class").value = data[0].class;
                document.getElementById("fathers_name").value = data[0].fathers_name;
                document.getElementById("f_adhar").value = data[0].f_adhar;
                document.getElementById("mothers_name").value = data[0].mothers_name;
                document.getElementById("m_adhar").value = data[0].m_adhar;
                document.getElementById("g_phone_no").value = data[0].g_phone_no;
                document.getElementById("email").value = data[0].email;
                document.getElementById("gur_name").value = data[0].gur_name;            
                document.getElementById("emg_contact_no").value = data[0].emg_contact_no;
                document.getElementById("address").value = data[0].address;
                document.getElementById("per_address").value = data[0].per_address;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }

   
</script>
@endsection