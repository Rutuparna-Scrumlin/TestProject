@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Class</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick='showAdd()'  data-bs-target="#exampleModal" id="addNewButton"> Add New</button>
                    </div>
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped datatable align-middle text-nowrap custom-table m-0">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Section</th>
                                        <!-- <th> Class Teacher</th> -->
                                        <th>Class Teacher</th>
                                         <th>Status</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($classdetails))
                                        <?php $sl = 1; ?>
                                        @foreach ($classdetails as $classdetail)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $classdetail->cls_name }}</td>
                                                <td>{{ $classdetail->section }}</td>
                                                <td>{{ $staffs[$classdetail->cls_teacher] }}</td>
                                              
                                                <td>{!! $classdetail->status == 'Active'
                                                    ? "<span class='status-btn badge bg-success'>Active</span>"
                                                    : "<span class='status-btn badge bg-danger'>Inactive</span>" !!}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href='#' class='editbtn' onclick='showEdit({{ $classdetail->id }})'
                                                            title='Edit'><img src='assets/images/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('classdetails/delete') }}/{{ $classdetail->id }}')"
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
                                <form enctype="multipart/form-data" name="Userform" id="Userform">
                                <input type="hidden" id="saveurl" value="classdetails/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage Class
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close" onclick="closePage()"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                    <div class="row">
                                        <!-- Student Information -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="cls_name" class="form-label">Class Name<span style='color:red' title='mandatory feild'>*</label>
                                                <input type="text" class="form-control" id="cls_name" name="cls_name" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="section" class="form-label">Section<span style='color:red' title='mandatory feild'>*</label>
                                                <select class="form-control" aria-label="section" id='section' name="section">
                                                    <option value="" disabled selected>Select..</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- 

                                         -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="room_name" class="form-label">Classroom Name<span style='color:red' title='mandatory feild'>*</label>
                                                <select class="form-select" aria-label="room_name" id='room_name' name="room_name" >
                                                    <option value="" disabled selected>Select..</option>
                                                @foreach ($classrooms as $key => $item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="room_name" class="form-label">ClassTeacher Name<span style='color:red' title='mandatory feild'>*</label>
                                                <select class="form-select" aria-label="cls_teacher" id='cls_teacher' name="cls_teacher" >
                                                    <option value=""  disabled selected>Select..</option>
                                                @foreach ($staffs as $key => $item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="acc_yr" class="form-label">Accademic Year</label>
                                                <input type="number" class="form-control" id="acc_yr" name="acc_yr"  min="1900" max="2099">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="strength" class="form-label">Strength Of Section</label>
                                                <input type="text" class="form-control" id="strength" name="strength">
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
    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });

        $("#Userform").submit(function(event) {
           //alert($('#section').val());
            event.preventDefault();
            var formData = new FormData(document.getElementById('Userform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#cls_name').val()=="" || $('#section').val()==null || $('#room_name').val()==null || $('#cls_teacher').val()==null){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
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
                    if(response.message == "ERROR!! Class Name Or Room already exist"){
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
                    if(response.message == "ERROR!! Class Name Or Room already exist"){
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
            url: "{{ url('classdetails/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Assuming you have the Bootstrap modal with ID 'exampleModal'
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                document.getElementById("cls_name").value = data[0].cls_name;
                document.getElementById("section").value = data[0].section;
                document.getElementById("room_name").value = data[0].room_name;
                document.getElementById("cls_teacher").value = data[0].cls_teacher;
                document.getElementById("acc_yr").value = data[0].acc_yr;
                document.getElementById("strength").value = data[0].strength;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }

   
</script>
@endsection
