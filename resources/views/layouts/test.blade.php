@extends('layouts.master')

@section('content')


<div class="container-fluid">

    <!-- Row start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addNewButton"> Add New</button>
                    </div>
                    <div class="border border-dark rounded-3">
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap custom-table m-0">
                                <thead>
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
                                    <!-- @if (!empty($users))
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
                                                            title='Edit'><img src='assets/img/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('user/delete') }}/{{ $user->id }}')"
                                                            title='Delete'><img src='assets/img/delete.svg'
                                                                style='height:23px; width:23px' /></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Add Contact -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form enctype="multipart/form-data" name="chamberform" id="chamberform">
                                <input type="hidden" id="saveurl" value="{{ url('user/savedata') }}" />
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
                                                        <input type="text" class="form-control" id="gender" name="gender">
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
    <!-- Row end -->

</div>
@endsection