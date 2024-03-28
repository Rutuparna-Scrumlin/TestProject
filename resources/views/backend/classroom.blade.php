@extends('layouts.master')

@section('content')


                        
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Classroom</h4>
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
                                        <th>Floor No</th>
                                        <th>Room Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @if (!empty($classrooms))
                                        <?php $sl = 1; ?>
                                        @foreach ($classrooms as $classroom)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $classroom->floor_no }}</td>
                                                <td>{{ $classroom->room_name }}</td>
                                                <td>{!! $classroom->status == 'Active'
                                                    ? "<span class='status-btn badge bg-success'>Active</span>"
                                                    : "<span class='status-btn badge bg-danger'>Inactive</span>" !!}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href='#' class='editbtn' onclick='showEdit({{ $classroom->clsrm_id }})'
                                                            title='Edit'><img src='assets/images/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('classroom/delete') }}/{{ $classroom->clsrm_id }}')"
                                                            title='Delete'><img src='assets/images/delete.svg'
                                                                style='height:23px; width:23px' /></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                   
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="Designationform" id="Designationform">
                                <input type="hidden" id="saveurl" value="classroom/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage Classroom
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
                                                <label for="floor_no" class="form-label">Floor No<span style='color:red' title='mandatory feild'>*</label>
                                                <input type="text" class="form-control" id="floor_no" name="floor_no" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="room_name" class="form-label">Room Name<span style='color:red' title='mandatory feild'>*</label>
                                                <input type="text" class="form-control" id="room_name" name="room_name" >
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

        $("#Designationform").submit(function(event) {
            
            event.preventDefault();
            var formData = new FormData(document.getElementById('Designationform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#floor_no').val()==""||$('#room_name').val()==""){
                    $('#error').html('Missing Mandatory Feilds!! Please Check (*) Mark');
                    return;
            }
            $.ajax({
                type: "POST",
                url: $("#saveurl").val(),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    // alert(response.message);
                    if(response.message == "ERROR!! Roomname already exists"){
                        $('#error').html(response.message).slideDown();
                        setTimeout(function() {
                        $('#error').slideUp();
                        }, 4000);
                    }else{
                        $('#success').html(response.message).slideDown();
                        document.getElementById('Designationform').reset();
                        setTimeout(function() {
                            $('#success').slideUp();
                        }, 2000);
                    }
                

                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! Roomname already exists"){
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
        document.getElementById("Designationform").reset();
        document.getElementById("mode").value = "add";
        document.getElementById("recordid").value = "";
        $('#department').empty();
    }


    function showEdit(id) {
        document.getElementById("Designationform").reset();
        document.getElementById("mode").value = "edit";
        document.getElementById("recordid").value = id;

        $.ajax({
            url: "{{ url('classroom/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Assuming you have the Bootstrap modal with ID 'exampleModal'
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                document.getElementById("floor_no").value = data[0].floor_no;
                document.getElementById("room_name").value = data[0].room_name;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }

   
</script>
@endsection
