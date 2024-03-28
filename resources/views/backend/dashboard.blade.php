@extends('layouts.master')

@section('content')
<main class="body-content">

<div class="app-body">

<!-- Container starts -->
<div class="container-fluid">

  <!-- Row start -->
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="icon-box lg rounded-3 bg-light mb-4">
                        <img src="assets/images/studentss.png" alt="" style="height:45px;"> 
                    </div>
                    <div class="ms-4">
                        <div>
                            <h5 class="mb-4 fw-normal">Total Students</h5>
                            <h1 class="fw-bold m-0 display-6">{{ $totalStudents }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="icon-box lg rounded-3 bg-light mb-4">
                        <img src="assets/images/staffs.png" alt="" style="height:45px;"> 
                    </div>
                    <div class="ms-4">
                        <div>
                            <h5 class="mb-4 fw-normal">Total Staffs</h5>
                            <h1 class="fw-bold m-0 display-6">{{ $totalStaffs }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="icon-box lg rounded-3 bg-light mb-4">
                        <img src="assets/images/elearning.png" alt="" style="height:45px;"> 
                    </div>
                    <div class="ms-4">
                        <div>
                            <h5 class="mb-4 fw-normal">Total Subjects</h5>
                            <h1 class="fw-bold m-0 display-6">{{ $totalSubjects }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="icon-box lg rounded-3 bg-light mb-4">
                        <img src="assets/images/teachers.png" alt="" style="height:45px;"> 
                    </div>
                    <div class="ms-4">
                        <div>
                            <h5 class="mb-4 fw-normal">Total Classes</h5>
                            <h1 class="fw-bold m-0 display-6">{{ $totalClasses }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Row end -->

  

  <!-- Row start -->
  <div class="row mt-3">
    <div class="col-xl-6 col-12">
      <div class="card mb-5">
        <div class="card-header">
          <h4 class="card-title">SCHOOL TOPPERS</h4>
        </div>
        <div class="card-body">
          <div class="border border-dark rounded-3">
            <div class="table-responsive">
              <table class="table align-middle custom-table m-0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Persentage</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <img src="assets/images/products/graduated.png" alt=""
                        class="img-4x rounded-3" />
                    </td>
                    <td>Dev Ranjan Kar</td>
                    <td>1</td>
                    <td>99.9%</td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/images/products/student.png" alt=""
                        class="img-4x rounded-3" />
                    </td>
                    <td>Asutosh Patnayik</td>
                    <td>2</td>
                    <td>99.5%</td>
                  </tr>
                  <tr>
                    <td>
                      <img src="assets/images/products/student1.png" alt=""
                        class="img-4x rounded-3" />
                    </td>
                    <td>Rutuparna Panda</td>
                    <td>3</td>
                    <td>99%</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-12">
      <div class="card mb-5">
        <div class="card-header">
          <h4 class="card-title">SUBJECT TABLES</h4>
        </div>
        <div class="card-body">
          <div class="border border-dark rounded-3">
            <div class="table-responsive">
              <table class="table align-middle custom-table m-0">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Subjects</th>
                    <th>Teachers</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#1</td>
                    <td>English</td>
                    <td>Rutuparna Panda</td>
                  </tr>
                  <tr>
                    <td>#2</td>
                    <td>Math</td>
                    <td>Rutuparna Panda</td>
                  </tr>
                  <tr>
                    <td>#3</td>
                    <td>History</td>
                    <td>Rutuparna Panda</td>
                  </tr>
                  <tr>
                    <td>#4</td>
                    <td>Computer Science</td>
                    <td>Rutuparna Panda</td>
                  </tr>
                  <tr>
                    <td>#5</td>
                    <td>Science</td>
                    <td>Rutuparna Panda</td>
                  </tr>
                  <tr>
                    <td>#6</td>
                    <td>EVS</td>
                    <td>Rutuparna Panda</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->

</div>
<!-- Container ends -->

</div>
</main>
@endsection
@section('scripts')
<script>

</script>
@endsection