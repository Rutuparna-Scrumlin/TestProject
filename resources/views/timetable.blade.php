@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Student Time Table</h4>
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick='showAdd()'  data-bs-target="#exampleModal" id="addNewButton"> Add New</button>
                    </div>
                </div>
                
                <div class="card-body">
                   
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered align-middle  text-nowrap custom-table m-0">
                               
                                <tr>
                                    <td align="center" height="50" width="100"><br>
                                        <b>Day/Period</b></br>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>I<br>9:30-10:20</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>II<br>10:20-11:10</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>III<br>11:10-12:00</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>12:00-12:40</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>IV<br>12:40-1:30</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>V<br>1:30-2:20</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>VI<br>2:20-3:10</b>
                                    </td>
                                    <td align="center" height="50" width="100">
                                        <b>VII<br>3:10-4:00</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Monday</b>
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">Che</td>
                                    <td rowspan="6" align="center" height="50">
                                        <h2>L<br>U<br>N<br>C<br>H</h2>
                                    </td>
                                    <td colspan="3" align="center" height="50">LAB</td>
                                    <td align="center" height="50">Phy</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Tuesday</b>
                                    </td>
                                    <td colspan="3" align="center" height="50">LAB
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">SPORTS</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Wednesday</b>
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">phy</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td colspan="3" align="center" height="50">LIBRARY
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Thursday</b>
                                    </td>
                                    <td align="center" height="50">Phy</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td colspan="3" align="center" height="50">LAB
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Friday</b>
                                    </td>
                                    <td colspan="3" align="center" height="50">LAB
                                    </td>
                                    <td align="center" height="50">Mat</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Phy</td>
                                </tr>
                                <tr>
                                    <td align="center" height="50">
                                        <b>Saturday</b>
                                    </td>
                                    <td align="center" height="50">Eng</td>
                                    <td align="center" height="50">Che</td>
                                    <td align="center" height="50">Mat</td>
                                    <td colspan="3" align="center" height="50">SEMINAR
                                    </td>
                                    <td align="center" height="50">SPORTS</td>
                                </tr>
                                   
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="timetableform" id="timetableform" >
                                <input type="hidden" id="saveurl" value="timetable/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage Timetable
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
                                                        <label for="name" class="form-label">Day <span style='color:red' title='mandatory feild'>*</label>
                                                        <select class="form-select" aria-label="fullname" id='name' name="name" >
                                                            <option value="">Select Day</option>
                                                            <option value="Sunday">Sunday</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Friday">Friday</option>
                                                            <option value="Saturday">Saturday</option>
                                                
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3">                
                                                    <div class="mb-3">
                                                        <label for="emp_id" class="form-label">From Time</label>
                                                        <input class="form-control" type="time" name='emp_id' id='emp_id' >
                                                    </div>
                                                </div>
                                                <div class="col-3">                
                                                    <div class="mb-3">
                                                        <label for="emp_id" class="form-label"> To Time</label>
                                                        <input class="form-control" type="time" name='emp_id' id='emp_id' >
                                                    </div>
                                                </div>
                                               
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Subject <span style='color:red' title='mandatory feild'>*</label>
                                                        <select class="form-select" aria-label="deg_name" id='deg_name' name="deg_name" onchange='loadName()'>
                                                                <option value="">Select Position</option>
                                                            @foreach ($subjects as $key => $item)
                                                                <option value="{{ $key }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
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
    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });

        $("#timetableform").submit(function(event) {
            
            event.preventDefault();
            var formData = new FormData(document.getElementById('timetableform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#role_name').val()==""){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
                    return; }
            $.ajax({
                type: "POST",
                url: $("#saveurl").val(),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    // alert(response.message);
                    if(response.message == "ERROR!! Role Name already exists"){
                        $('#error').html(response.message).slideDown();
                        setTimeout(function() {
                        $('#error').slideUp();
                        }, 4000);
                    }else{
                        $('#success').html(response.message).slideDown();
                        document.getElementById('timetableform').reset();
                        setTimeout(function() {
                            $('#success').slideUp();
                        }, 2000);
                    }
                

                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! Role Name already exists"){
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
        document.getElementById("timetableform").reset();
        document.getElementById("mode").value = "add";
        document.getElementById("recordid").value = "";
        $('#department').empty();
    }


    function showEdit(id) {
        document.getElementById("timetableform").reset();
        document.getElementById("mode").value = "edit";
        document.getElementById("recordid").value = id;

        $.ajax({
            url: "{{ url('timetable/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Assuming you have the Bootstrap modal with ID 'exampleModal'
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                document.getElementById("role_name").value = data[0].role_name;
                document.getElementById("description").value = data[0].description;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }

   
</script>

@endsection
