<div class="container">
	<!-- Page Heading 
	<h1 class="h3 mb-2 text-gray-800">Konfirmasi Konsultasi</h1>
	-->
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Konfirmasi Konsultasi</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="laporan_konsultasi" width="100%">
					<thead>
						<tr>
							<th width="1%">
								<center>No</center>
							</th>
							<th width="12%">
								<center>Nama</center>
							</th>
							<th width="7%">
								<center>No.Telepon</center>
							</th>
							<th width="10%">
								<center>Photo KTP</center>
							</th>
							<th width="5%">
								<center>Tanggal Permohonan</center>
							</th>
							<th width="5%">
								<center>Waktu Permohonan</center>
							</th>
							<th width="5%">
								<center>Jenis Informasi</center>
							</th>
							<th width="18%">
								<center>Informasi yang diminta</center>
							</th>
							<th width="">
								<center>Aksi</center>
							</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
	$('#laporan_konsultasi').ready(function() {
		var c = $('#laporan_konsultasi').DataTable();
		load_data();

		function load_data() {
			$.ajax({

				url: '<?php echo site_url('AdminControl/get_all_konsultasi') ?>',
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();
					var HTMLbuilder = "";
					for (var i = 0; i < data.length; i++) {
						var btn1 = '<button type="button" name="btn_terima" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-primary btn-circle btn_terima"><i class="fas fa-check"></i></button>';
						var btn2 = '<button type="button" name="btn_delete" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-danger btn-circle btn_tolak"><i class="fas fa-trash"></i></button>';
						var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='150' height='100'>";
						//	HTMLbuilder = HTMLbuilder + imgHtml;
						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + data[i]['nama_permohon'] + "</center>",
							"<center>" + data[i]['no_telepon'] + "</center>",
							"<center>" + imgHtml + "</center>",
							"<center>" + data[i]['tanggal_permohonan'] + "</center>",
							"<center>" + data[i]['waktu_permohonan'] + "</center>",
							"<center>" + data[i]['jenis_informasi'] + "</center>",
							"<center>" + data[i]['tujuan_informasi'] + "</center>",
							"<center>" + btn1 + btn2 + "</center>",

						]).draw();
					}
				}
			});
		}


		$(document).on("click", ".btn_terima", function() {
			var no_konsul = $(this).attr('id');
			var status = 'terima';
			var view = 1;

			$.ajax({
				url: "<?php echo site_url('AdminControl/konfirmasi_konsul'); ?>",
				method: "POST",
				data: {
					no_konsul: no_konsul,
					status: status,
					view: view
				},
				success: function(data) {
					load_unseen_notification();
					load_data();
					swal({
						title: 'Konfirmasi Berhasil',
						text: '',
						type: 'success'
					});
				}
			});

		});

		$(document).on("click", ".btn_tolak", function() {
			var no_konsul = $(this).attr('id');
			var status = 'ditolak';
			var view = 0;
			swal({
					title: "Tolak Konsultasi",
					text: "Apakah anda yakin akan Menolak Konsultasi ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
				function() {
					$.ajax({
						url: "<?php echo site_url('AdminControl/konfirmasi_konsul'); ?>",
						method: "POST",
						data: {
							no_konsul: no_konsul,
							status: status,
							view: view
						},
						success: function(data) {
							load_data();
							swal({
								title: 'Berhasil Ditolak',
								text: '',
								type: 'success'
							});
						}
					});
				});
		});
	});
</script>