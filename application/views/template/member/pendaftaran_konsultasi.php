<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card mb-12">
		<div class="card-header">
			<h1 class="h3">Pendaftaran Permohonan Konsultasi</h1>
		</div>
		<div class="card-body">
			<div class="row">
				<!-- Laporan Konsultasi -->
				<div class="col-lg-2"></div>
				<div class="col-lg-8" align="center">
					<!-- Collapsable Card Example -->
					<div class="card shadow mb-4">
						<!-- Card Header - Accordion -->
						<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
							<h6 class="m-0 font-weight-bold text-success">Form Pendaftaran Konsultasi</h6>
						</a>
						<!-- Card Content - Collapse -->
						<div class="collapse show" id="collapseCardExample">
							<div class="card-body" align="left">
								<form id="mohon_form" class="user" method="POST">
									<div class="form-group">
										<label for="nama_permohonan">No. Urut Pendaftaran : </label>
										<input type="text" class="form-control" id="nomor_urut" name="nomor_urut" value="<?php echo $no_urut ?>" readonly>
									</div>
									<div class="form-group">
										<label for="nama_permohonan">Nama Pemohon Konsultasi : </label>
										<input type="text" class="form-control" id="nama_permohon" value="<?php echo $nama ?>" name="nama_permohon" readonly>
									</div>
									<div class="form-group">
										<label>Tanggal Permohonan Konsultasi : </label>
										<input type="date" class="form-control" id="tanggal_permohonan" name="tanggal_permohonan">
									</div>
									<div class="form-group">
										<label>Waktu Permohonan Konsultasi : </label>
										<input type="time" class="form-control" id="waktu_permohonan" name="waktu_permohonan">
									</div>
									<div class="form-group">
										<label for="nama_permohonan">No.Telepon Yang Dapat Dihubungi : </label>
										<input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
									</div>
									<div class="form-group">
										<label for="nama_permohonan">Upload KTP : </label>
										<div class="custom-file">
											<input type="file" name="file" id="fileToUpload">
										</div>
									</div>
									<div class="form-group">
										<label for="jenis_permohonan">Jenis Permohonan Konsultasi : </label>
										<select class="form-control" id="jenis_informasi" name="jenis_informasi">
											<option>Adopsi Anak</option>
											<option>Perceraian</option>
											<option>Waris</option>
											<option>Hibah</option>
											<option>Wasiat</option>
											<option>Wakaf</option>
											<option>Zakat</option>
											<option>Infaq</option>
											<option>Shadaqoh</option>
											<option>Ekonomi Syariah</option>
										</select>
									</div>
									<div class="form-group">
										<label for="informasi">Tujuan informasi yang diminta : </label>
										<textarea class="form-control" rows="3" name="tujuan_informasi" id="tujuan_informasi"></textarea>
									</div>
									<button type="submit" value="clear" id="setUlang" class="btn btn-danger">Refresh</button>
									<!--	<button type="submit" class="btn btn-primary" id="submitMohon" onclick="simpan();">Submit</button> -->
									<button type="submit" class="btn btn-primary" id="submitMohon">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>
	<!-- Page Heading -->
</div>

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.2.1.js' ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$('#mohon_form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/MemberControl/submit_mohon',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					//alert("Upload Image Berhasil.");
					swal({
						title: 'Berhasil Dikirim',
						text: '',
						type: 'success'
					});
					location.reload();
				}
			});
		});


	});
</script>