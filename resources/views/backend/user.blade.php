@extends('layouts.master')

@section('content')                       
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users</h4>
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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Emp Id</th>
                                        <th>Role</th>
                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($users))
                                        <?php $sl = 1; ?>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{$staffs[$user->name] }}</td>
                                                <td>{{ $user->emp_id }}</td>
                                                <td>{{ $roles[$user->role_name] }}</td>
                                                <td>{{ $user->user_name}}</td>
                                                <td>{!! $user->status == 'Active'
                                                    ? "<span class='status-btn badge bg-success'>Active</span>"
                                                    : "<span class='status-btn badge bg-danger'>Inactive</span>" !!}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href='#' class='editbtn' onclick='showEdit({{ $user->id }})'
                                                            title='Edit'><img src='assets/images/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('user/delete') }}/{{ $user->id }}')"
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="Userform" id="Userform" >
                                <input type="hidden" id="saveurl" value="user/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage User
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
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="deg_name" class="form-label">Designation <span style='color:red' title='mandatory feild'>* </label>
                                                        <select class="form-select" aria-label="deg_name" id='deg_name' name="deg_name" onchange='loadName()'>
                                                                <option value="">Select Position</option>
                                                            @foreach ($designations as $key => $item)
                                                                <option value="{{ $key }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Full Name <span style='color:red' title='mandatory feild'>*</label>
                                                        <select class="form-select" aria-label="fullname" id='name' name="name" >
                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    
                                                    <div class="mb-3">
                                                        <label for="emp_id" class="form-label">Employee ID </label>
                                                        <input class="form-control" type="text" name='emp_id' id='emp_id' readonly/>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="role_name" class="form-label">Select User <span style='color:red' title='mandatory feild'>*</label>
                                                        <select class="form-select" aria-label="role_name" id='role_name' name="role_name" >
                                                            <option value=" ">Select Role..</option>
                                                                @foreach ($roles as $key => $item)
                                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="user_name" class="form-label">User Name <span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User Name">
                                                    </div>
                                                </div>
                                                <div class="col-6" id="rem">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password (Alteast 8 Characters)<span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password ">
                                                    </div>
                                                </div>
                                                <div class="col-6" id="rem1">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Confirm Password <span style='color:red' title='mandatory feild'>*</label>
                                                        <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirm Password">
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
function loadName(name=""){
    var designationId = $('#deg_name').val();
        //alert(designationId);  
        $('#name').empty();
        $.ajax({
            url: '{{url ("staff/staffname")}}',
            type: 'POST',
            data: {designationId:designationId , _token:'{{csrf_token()}}'},
            success: function(response) {
                // $('#name').empty();
                // $('#name').append('<option value="">Select Name</option>'); // Add default option
                // $.each(response.staffs, function(key, value) {
                //     $('#name').append('<option value="' + value.id + '">' + value.name + '</option>');
                // });
                
            // ****************************************************************
            $('#name').append('<option value="" disabled selected>Select Name</option>'); 
            if (response && response.name !== undefined && Object.keys(response.name).length > 0) {
                $.each(response.name, function (value, name) {
                    $('#name').append($('<option>', {
                        value: value,
                        text: name
                    }));
                });
                $('#name').val(name);
            }
            // *********************************************************************
            }
        }); 
}

    //  document.addEventListener('DOMContentLoaded', function () {
    //         generateEmployeeId();
    //     });

    //     function generateEmployeeId() {
    //         // Assume the lastEmployeeId is fetched from the server or set it to 0 initially
    //         var lastEmployeeId = 0;
    //         var nextEmployeeId = lastEmployeeId + 1;

    //         // Format the employee ID as 'EMP' followed by three-digit numeric value
    //         var formattedEmployeeId = 'EMP' + ('00' + nextEmployeeId).slice(-3);

    //         // Set the value of the emp_id input field
    //         document.getElementById('emp_id').value = formattedEmployeeId;
    //     }

//......** Fetching Data **....
$(document).ready(function() {
    // $('#deg_name').change(function() {
    //     var designationId = $(this).val();
    //     //alert(designationId);  
    //     $('#name').empty();
    //     $.ajax({
    //         url: '{{url ("staff/staffname")}}',
    //         type: 'POST',
    //         data: {designationId:designationId , _token:'{{csrf_token()}}'},
    //         success: function(response) {
    //             // $('#name').empty();
    //             // $('#name').append('<option value="">Select Name</option>'); // Add default option
    //             // $.each(response.staffs, function(key, value) {
    //             //     $('#name').append('<option value="' + value.id + '">' + value.name + '</option>');
    //             // });
                
    //         // ****************************************************************
    //         $('#name').append('<option value="" disabled selected>Select Name</option>'); 
    //         if (response && response.name !== undefined && Object.keys(response.name).length > 0) {
    //             $.each(response.name, function (value, name) {
    //                 $('#name').append($('<option>', {
    //                     value: value,
    //                     text: name
    //                 }));
    //             });
    //         }
    //         // *********************************************************************
    //         }
    //     });
    // });

    $('#name').change(function() {
    var userId = $(this).val();

   // alert(userId);
    $.ajax({
        url: '{{ url("staff/staffId") }}',
        type: 'POST',
        data: { userId: userId, _token: '{{ csrf_token() }}' },
        success: function(response) {
            // if (response.emp_id && response.emp_id.length > 0) {
            //     // Assuming emp_id is a single value
            //     $('#emp_id').val(response.emp_id[Object.keys(response.emp_id)[0]]);
            //     // Handle case when no matching record is found
            //     console.error('No matching record found');
            //     // Clear the emp_id field
            //     $('#emp_id').val('');
            // }

            if (response.emp_id) {
        // Assuming emp_id is a single value
        $('#emp_id').val(response.emp_id[Object.keys(response.emp_id)[0]]);
    } else {
        // Handle case when no matching record is found
        console.error('No matching record found');
        // Clear the emp_id field
        $('#emp_id').val('');
    }
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
            // Clear the emp_id field
            $('#emp_id').val('');
        }
    });
});





});

//......**End Fetching Data **....



    function closePage() {
        location.reload();
    }
    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });

       
        $('#user_name').on('change',function(){
            var usernameRegex = /^[A-Za-z0-9]+$/;
            var usernameValue = $(this).val();

            if (!usernameRegex.test(usernameValue)) {
                $("#error").html("Please Enter a Valid Username!! No Special Characters Allowed");
                return false;
            }

        });
        $('#user_name').on('input', function() {
            $('#error').html(''); // Clear the error message on input/correction
           
        });

        $('#password').on('input',function(){
            var passwordValue = $(this).val();

            var hasUppercase = /[A-Z]/.test(passwordValue);
            var hasDigit = /\d/.test(passwordValue);
            var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(passwordValue);
            var hasNoSpace = !/\s/.test(passwordValue);

            if (
                passwordValue.length >= 8 &&
                hasUppercase &&
                hasDigit &&
                hasSpecialChar &&
                hasNoSpace
            ) {
                // Password meets the criteria
                $('#error').html('');
            } else {
                // Password does not meet the criteria
                $('#error').html('Password must have at least 8 characters, including an uppercase letter, a digit, and a special character. Spaces are not allowed.');
            } 
        });
        $('#confpassword').on('input',function(){
            if($('#password').val()!=$('#confpassword').val()){
                $('#error').html('Password and Confirm Password Do Not Match!! Please Check');
            }else{
                $('#error').html('');
            }
        });

       



       

        $("#Userform").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById('Userform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#user_name').val()==""||$('#password').val()==""||$('#confpassword').val()==""||
                $('#role').val()==""||
                $('#status').val()==""){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
                    return;
            }
           
            var usernameRegex = /^[A-Za-z0-9]+$/;
            var usernameValue = $('#user_name').val();

            if (!usernameRegex.test(usernameValue)) {
                $("#error").html("Please Enter a Valid Username!! No Spaces Allowed");
                return false;
            }

            var passwordValue = $('#password').val();

            var hasUppercase = /[A-Z]/.test(passwordValue);
            var hasDigit = /\d/.test(passwordValue);
            var hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(passwordValue);
            var hasNoSpace = !/\s/.test(passwordValue);

            if (
                passwordValue.length >= 8 &&
                hasUppercase &&
                hasDigit &&
                hasSpecialChar &&
                hasNoSpace
            ) {
                // Password meets the criteria
                $('#error').html('');
            } else {
                // Password does not meet the criteria
                $('#error').html('Password must have at least 8 characters, including an uppercase letter, a digit, and a special character. Spaces are not allowed.');
                return false;
            }
            if($('#password').val()!=$('#confpassword').val()){
                $('#error').html('Password and Confirm Password Do Not Match!! Please Check');
                return false;
            }
            
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
                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! User Name Or Email or Adhar or Pan or UAN already exist"){
                        $('#error').html(response.message).slideDown();
                        setTimeout(function() {
                        $('#error').slideUp();
                        }, 4000);
                    }else{
                        location.reload();
                    }
                }

            },
            });
        });
    });

    // alert(response.message);
    //                 document.getElementById('Userform').reset();
    //                 fetch('/user/getid')
    //                 .then(response => response.text())
    //                 .then(newId => {
    //                     $('#emp_id').val(newId);
    //                 });
    function showAdd() {
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
            url: "{{ url('user/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            // Assuming the response from the server contains 'data' object with necessary fields
            success: function(data) {
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

               document.getElementById("deg_name").value = data[0].deg_name;
                
                
                // Set the selected option in the 'name' dropdown menu
                //$('#name').val(data[0].name);

                loadName(data[0].name);
                // Set other fields similarly
                document.getElementById("emp_id").value = data[0].emp_id;
                document.getElementById("role_name").value = data[0].role_name;
                document.getElementById("user_name").value = data[0].user_name;
                document.getElementById("password").value = data[0].password;
                document.getElementById("confpassword").value = data[0].password;
                document.getElementById("status").value = data[0].status;
                document.getElementById("rem").style.display = "none";
                document.getElementById("rem1").style.display = "none";
            },

            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }

   
</script>
@endsection
