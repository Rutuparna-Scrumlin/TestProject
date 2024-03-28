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
                    <div class="border border-dark rounded-3">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped datatable align-middle text-nowrap custom-table m-0">
                                <thead class="">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>PhoneNo</th>
                                        <th>DOB</th>
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
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact_no }}</td>
                                                <td>{{ $user->dob}}</td>
                                                <td>{!! $user->status == 'Active'
                                                    ? "<span class='status-btn success-btn'>Active</span>"
                                                    : "<span class='status-btn danger-btn'>Inactive</span>" !!}</td>
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="Userform" id="Userform">
                                <input type="hidden" id="saveurl" value="user/savedata" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Manage User
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
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="user_name" class="form-label">User Name</label>
                                                        <input type="text" class="form-control" id="user_name" name="user_name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="contact_no" class="form-label">Phone No</label>
                                                        <input type="text" class="form-control" id="contact_no" name="contact_no">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="dob" class="form-label">DOB</label>
                                                        <input type="date" class="form-control" id="dob" name="dob">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender</label>
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
                                                        <label for="role" class="form-label">Role</label>
                                                        <select class="form-control" aria-label="status" id='role' name="role">
                                                            <option value="1">Superadmin</option>
                                                            <option value="2">Admin</option>
                                                            <option value="3">Teacher</option>
                                                            <option value="4">Student</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Form Field Start -->
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">Address</label>
                                                        <textarea class="form-control" name="address" id="address" ></textarea>
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
    $(document).ready(function() {
        $("#addNewButton").click(function() {
            showAdd();
            
            $('#exampleModal').modal('show');
        });

        $("#Userform").submit(function(event) {
            
            event.preventDefault();
            var formData = new FormData(document.getElementById('Userform'));
            formData.append("_token", '{{ csrf_token() }}');
            $.ajax({
                type: "POST",
                url: $("#saveurl").val(),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    alert(response.message);
                    location.reload();
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
            url: "{{ url('user/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Assuming you have the Bootstrap modal with ID 'exampleModal'
                let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                document.getElementById("name").value = data[0].name;
                document.getElementById("user_name").value = data[0].user_name;
                document.getElementById("password").value = data[0].password;
                document.getElementById("email").value = data[0].email;
                document.getElementById("contact_no").value = data[0].contact_no;
                document.getElementById("dob").value = data[0].dob;
                document.getElementById("gender").value = data[0].gender;
                document.getElementById("role").value = data[0].role;
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
$existcatName = TestCategory::where('test_category_name', ucwords($request->testcatname))->first();
                $existcatCode = TestCategory::where('test_category_code', $request->testcatcode)->first();
 
                if ($existcatName && $existcatCode) {
                    // Both name and code already exist, do not update
                    return response()->json(['status' => false, 'message' => "ERROR!! Test Category Name Or Code already exist"]);
                } elseif ($existcatName) {
                    // Only name exists, update code only
                    $updatecategory = TestCategory::where('id', $request->recordid)->update([
                        'test_category_code' => $request->testcatcode,
                        'status' => $request->status
                    ]);
                    return response()->json(["Status"=>true,"message"=>"Test Category Code Updated Successfully"]);
                } elseif ($existcatCode) {
                    // Only code exists, update name only
                    $updatecategory = TestCategory::where('id', $request->recordid)->update([
                        'test_category_name' => ucwords($request->testcatname),
                        'status' => $request->status
                    ]);
                    return response()->json(["Status"=>true,"message"=>"Test Category Name Updated Successfully"]);
                } else {
                    // Both name and code are new, update both
                    $updatecategory = TestCategory::where('id', $request->recordid)->update([
                        'test_category_name' => ucwords($request->testcatname),
                        'test_category_code' => $request->testcatcode,
                        'status' => $request->status
                    ]);
                    return response()->json(["Status"=>true,"message"=>"Test Category Updated Successfully"]);
                }
            // ****************************************************************// *********************************************************************************

private function generateRegnNo($reg_no){
    //$randno = rand(11,99);
    if($reg_no !=""){
        return $reg_no;
    }else{
        $count = Counter::select('counter')->get();
        //print_r($count);exit;
        foreach($count as $c){
            $upcount = ++$c->counter;
        }
        //print_r($upcount);exit;
        $formattedUpcount = sprintf('%04d', $upcount);
        $reg_no = "ORG-".time()."-".$formattedUpcount;
        $updatecount = Counter::where('id','=',1)->update(['counter'=>$upcount]);
        
    }
    return $reg_no;
    //print_r($reg_no);exit;
}
// *****************************************************************************