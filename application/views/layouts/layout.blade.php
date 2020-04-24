@php
$CI =& get_instance();
$user = $CI->session->userdata('auth');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>ARSIP</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ base_url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ base_url('assets/modules/fontawesome/css/all.min.css') }}">

	<!-- CSS Libraries -->
	@yield('css-export')
	<link rel="stylesheet" href="{{ base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">


	
	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ base_url('assets/css/components.css') }}">

	@yield('css-inline')
	{{-- <style>
		.action-no-wrap {
			width: 1%;
			white-space: nowrap;
		}
		.main-sidebar .sidebar-brand {
			text-align: left;
			margin-left: 10px;
		}
		.main-sidebar .sidebar-brand img{
			width: 60px;
		}
		.main-sidebar .sidebar-brand a{
			margin-left: 10px;
		}
	</style> --}}

</head>

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="index.html" class="navbar-brand sidebar-gone-hide">SISARSIP</a>
				<a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
				<div class="nav-collapse">
					<a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
						<i class="fas fa-ellipsis-v"></i>
					</a>
					
				</div>
				<form class="form-inline ml-auto">
					
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
						{{-- <img alt="image" src="#" class="rounded-circle mr-1"> --}}
						<div class="d-sm-none d-lg-inline-block">Pengguna</div></a>
						<div class="dropdown-menu dropdown-menu-right">
							
							
							
							
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>

			@include('layouts.navbar')

			<!-- Main Content -->
			<div class="main-content">
				@yield('content')
			</div>
			{{-- <footer class="main-footer">
				<div class="footer-left"></div>
				<div class="footer-right">

				</div>
			</footer> --}}
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="{{ base_url('assets/modules/jquery.min.js') }}"></script>
	<script src="{{ base_url('assets/modules/popper.js') }}"></script>
	<script src="{{ base_url('assets/modules/tooltip.js') }}"></script>
	<script src="{{ base_url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ base_url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>


	<script src="{{ base_url('assets/modules/moment.min.js') }}"></script>
	<script src="{{ base_url('assets/axios.min.js') }}"></script>
	<script src="{{ base_url('assets/sweetalert2.all.min.js') }}"></script>
	<script src="{{ base_url('assets/js/stisla.js') }}"></script>


	@yield('js-export')

	<script src="{{ base_url("assets/modules/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
	<script src="{{ base_url('assets/jquery_chained-2.x/jquery.chained.min.js') }}"></script>


	<!-- Page Specific JS File -->
	@yield('js-inline')

	<!-- Template JS File -->
	<script src="{{ base_url('assets/js/scripts.js') }}"></script>
	<script src="{{ base_url('assets/js/custom.js') }}"></script>

	<script>

		function toggleModal(modal, state) {
			if (state == $('body').hasClass('modal-open')) {
				throw new Error('Modal is already ' + (state ? 'shown' : 'hidden') + '!');
			}

			var d = $.Deferred();

			modal.one(state ? 'shown.bs.modal' : 'hidden.bs.modal', d.resolve)
			.modal(state ? 'show' : 'hide');
			return d.promise();
		}

	</script>

</body>
</html>