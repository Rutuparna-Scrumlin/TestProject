<!DOCTYPE html>
<html lang="en">

	
<!-- Mirrored from www.kodingwife.com/demos/templatemonster/my-cab/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 10:44:01 GMT -->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>School Management System</title>

	<!-- Meta -->
	<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
	<meta name="author" content="Bootstrap Gallery" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="assets/images/favicon.svg" />

	<!-- *************
		************ CSS Files *************
	************* -->
	<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
	<link rel="stylesheet" href="assets/css/main.min.css" />

	<!-- *************
		************ Vendor Css Files *************
	************ -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css" />
	<!-- Scrollbar CSS -->
	<link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
	<style>
		.menu-text{
		font-size: 18px;
		font-weight: 600;
		}
		.err{
			color:red;
			font-weight:600;
		}
		ul li{
			border-bottom:1px solid red
		}
		/* #bgimg{
			background-image: url("assets/images/banner.png");
		} */
		.form-check-input{
			border: var(--bs-border-width) solid #111418 !important;
		}
		/* .cord-body{
			bs-card-bg: #38da3157 !important;
		} */

	</style>
</head>

	<body>
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				<nav id="sidebar" class="sidebar-wrapper">

					<!-- App brand starts -->
					<div class="app-brand px-3 py-2 d-flex align-items-center">
						<a href="index.html">
						<img src="assets/images/smslogo.png" class="logo" alt="Bootstrap Gallery" /><b style="font-size:25px">School</b>
						</a>
					</div>
					<!-- App brand ends -->

					<!-- Sidebar menu starts -->
					<div class="sidebarMenuScroll">
						<ul class="sidebar-menu">
							<li>
								<a  href="{{ url('dashboard')}}">
									<img src="assets/images/dashboard.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Dashboard</span>
								</a>
							</li>
							<li>
								<a href="{{ url('user')}}">
								<img src="assets/images/teamwork.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">User</span>
									
								</a>
							</li>
							<li>
								<a href="{{ url('staff')}}">
								<img src="assets/images/training.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Staff</span>
									
								</a>
							</li>
							<li>
								<a href="{{ url('student')}}">
								<img src="assets/images/students.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Student</span>
									
								</a>
							</li>
							<li>
								<a href="{{ url('student')}}">
								<img src="assets/images/chapter.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Manage Student</span>
									
								</a>
							</li>
							<li>
								<a href="{{ url('attendance')}}">
								<img src="assets/images/roll-call.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Attendance</span>
									
								</a>
							</li>
							<li>
								<a href="trips.html">
								<img src="assets/images/timetable.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Timetable</span>
									
								</a>
							</li>
							<li>
								<a href="trips.html">
								<img src="assets/images/exam.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Results</span>
									
								</a>
							</li>
							<li class="treeview">
								<a href="#!">
								<img src="assets/images/lock.png" alt=""> &nbsp;&nbsp;
									<span class="menu-text">Master</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="{{ url('classdetails')}}">Class</a>
									</li>
									<li>
										<a href="{{ url('section')}}">Section</a>
									</li>
									<li>
										<a href="{{ url('subject')}}">Subject</a>
									</li>
									<li>
										<a href="{{ url('designation')}}">Designation</a>
									</li>
									<li>
										<a href="{{ url('role')}}">Role</a>
									</li>
									<li>
										<a href="{{ url('classroom')}}">Classroom</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- Sidebar menu ends -->

				</nav>
				<!-- Sidebar wrapper end -->

				<!-- App container starts -->
				<div class="app-container">

					<!-- App header starts -->
					<div class="app-header d-flex align-items-center">
						<img src="assets/images/banner2.png" alt="">

						<!-- Toggle buttons start -->
						<div class="d-flex">
							<button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
								<i class="bi bi-list fs-5"></i>
							</button>
							<button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
								<i class="bi bi-list fs-5"></i>
							</button>
						</div>
						<!-- Toggle buttons end -->

						<!-- App brand sm start -->
						<div class="app-brand-sm d-md-none d-sm-block">
							<a href="index.html">
								<img src="assets/images/smslogo.png" class="logo" alt="Bootstrap Gallery">
							</a>
						</div>
						<!-- App brand sm end -->

						<!-- Breadcrumb start -->
						<ol class="breadcrumb d-none d-lg-flex ms-3">
							<li class="breadcrumb-item">
								<i class="bi bi-house lh-1"></i>
								<a href="index.html" class="text-decoration-none">Home</a>
							</li>
							<li class="breadcrumb-item text-secondary">Users</li>
						</ol>
						<!-- Breadcrumb end -->

						<!-- App header actions start -->
						<div class="header-actions">
							<div class="dropdown ms-3">
								<a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
									href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="assets/images/smslogo.png" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
								</a>
								<div class="dropdown-menu dropdown-menu-end shadow-sm">
									<div class="p-3 border-bottom mb-2">
										<h6 class="mb-1">Rutuparna Panda</h6>
										<p class="m-0 small opacity-50">rutu@gmail.com</p>
									</div>
									<a class="dropdown-item d-flex align-items-center" href=""><i
											class="bi bi-person fs-4 me-2"></i>Profile</a>
									<a class="dropdown-item d-flex align-items-center" href=""><i
											class="bi bi-gear fs-4 me-2"></i>Settings</a>
									<div class="d-grid p-3 py-2">
										<a class="btn btn-danger" href="login.html">Logout</a>
									</div>
								</div>
							</div>
						</div>
						<!-- App header actions end -->

					</div>
					<!-- App header ends -->

					<!-- App body starts -->
					<div class="app-body">
                        @yield('content')
						

					</div>
					<!-- App body ends -->

					

				</div>
				<!-- App container ends -->

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- *************
			************ Datatables Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap5.min.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>
		@yield('scripts')
		<!-- Custom JS files -->
		<script src="assets/js/custom.js"></script>
		<script>

			function deleteData(delurl){
				if(confirm("Are you very sure you want to delete this")){
				$.ajax({
					url: delurl,
					headers: { '_token': '{{csrf_token()}}' },
					type: "get",
					dataType: "json",
					success: function (data) {
						console.log(data);
						location.reload();
					},
					error: function() {
						return false;
					}
				});
				}
			}


			new DataTable('.datatable');
			function openUrl(url){
			var Url = url;
			var target = '__blank';
			window.open(Url,target);
			}

		</script>
	</body>
</html>