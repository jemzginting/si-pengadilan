<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">My Profile</h1>
	<div class="col-xl-5 col-md-3 mb-2">
		<div class="card  shadow h-10 py-4">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col-sm-4">
						<i class="far fa-user-circle fa-6x text-gray-300"></i>
					</div>
					<div class="col-sm-8">
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $session['name']; ?></div>
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $session['nik']; ?></div>
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $session['email']; ?></div>
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $session['pekerjaan']; ?></div>
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $session['alamat']; ?></div>
						<div class="h6 mb-0 font-weight-bold text-gray-800"><small>Member since <?= date('d F Y', $session['date_created']); ?></small></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->