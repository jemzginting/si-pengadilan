<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>img/logo.jpg">

	<title>
		<?= $title; ?>
	</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-success">
	<div class="container">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-6 d-lg-block bg-register-image" style="background-image: url('/pengadilan/assets/img/backgroundreg.png')"></div>
					<div class="col-lg-6">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4"><b>PENGADILAN TINGGI AGAMA KOTA PALEMBANG</b></h1>
								<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
							</div>
							<form class="user" method="POST" action="<?= base_url('AuthLogin/register'); ?>">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>">
									<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
									<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK" value="<?= set_value('nik'); ?>">
									<?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= set_value('pekerjaan'); ?>">
									<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="alamat" value="<?= set_value('alamat'); ?>">
									<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
										<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="<?= base_url('AuthLogin'); ?>" style="font-size:12px;">Already have an account? Login!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
</body>





</html>