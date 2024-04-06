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
                                    @if (!empty($managesections))
                                        <?php $sl = 1; ?>
                                        @foreach ($managesections as $managesection)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{$classdetail[$managesection->cls_name] }}</td>
                                                <td>{{ $students[$managesection->std_name] }}</td>
                                                <td>{{ $sections[$managesection->sec_name]}}</td>
                                                <td>{{ $managesection->roll_no}}</td>
                                                <td>{!! $managesection->status == 'Active'
                                                    ? "<span class='status-btn badge bg-success'>Active</span>"
                                                    : "<span class='status-btn badge bg-danger'>Inactive</span>" !!}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href='#' class='editbtn' onclick='showEdit({{ $managesection->id }})'
                                                            title='Edit'><img src='assets/images/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('managesection/delete') }}/{{ $managesection->id }}')"
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
                                                        <select class="form-select" aria-label="class" id='cls_name' name="cls_name" onchange='loadName()'>
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
                                                        <label for="sec_name" class="form-label">Section <span style='color:red' title='mandatory feild'>* </label>
                                                        <select class="form-select" aria-label="sec_name" id='sec_name' name="sec_name">
                                                                <option value="">Select Section</option>
                                                            @foreach ($sections as $key => $item)
                                                                <option value="{{ $key }}">{{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">                                                 
                                                    <div class="mb-3">
                                                        <label for="roll_no" class="form-label">Roll No  <span style='color:red' title='mandatory feild'>* </label>
                                                        <input class="form-control" type="text" name='roll_no'placeholder="Enter Roll No" id='roll_no' />
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

function loadName(std_name="") {
    var classId = $('#cls_name').val();
    $('#std_name').empty();
    $.ajax({
        url: '{{ url("managesection/stdname") }}',
        type: 'POST',
        data: {
            classId: classId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#std_name').append('<option value="" disabled selected>Select Name</option>');
            if (response && response.std_names) {
                $.each(response.std_names, function (std_id, std_name) {
                    $('#std_name').append($('<option>', {
                        value: std_id,
                        text: std_name
                    }));
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(error); // Log any errors to the console for debugging
        }
    });
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
        $("#Userform").submit(function(event) {
            
            event.preventDefault();
            var formData = new FormData(document.getElementById('Userform'));
            formData.append("_token", '{{ csrf_token() }}');
            if($('#cls_name').val()==""||$('#std_name').val()==""||$('#sec_name').val()==""||$('#roll_no').val()==""||
                $('#status').val()==""){
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
            url: "{{ url('managesection/edit') }}/" + id,
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
                loadName(data[0].std_name);
                document.getElementById("sec_name").value = data[0].sec_name;
                document.getElementById("roll_no").value = data[0].roll_no;
                document.getElementById("status").value = data[0].status;
            },
            error: function() {
                console.error("Error loading data for edit.");
            }
        });
    }

   
</script>
@endsection