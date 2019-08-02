<?php $date = date('Y'); ?>

<div class="container">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Rekapan Konsultasi</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Rekapan Konsultasi</h6>
		</div>
		<div class="card-body">
			<form id="form-tampil-rekap" class="form-horizontal form-label-left" onsubmit="return false;">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label class="control-label">Tahun</label>
						<select class="form-control" id="tahun" name="tahun">
							<?php for ($i = $date; $i >= 2019; $i--) { ?>
								<option value='<?php echo $i; ?>'> <?php echo $i; ?> </option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label class="control-label">Bulan</label>
						<select class="form-control" id="bulan" name="bulan" onclick="tampilkan();">
							<option value=''>Pilih Bulan</option>
							<option value='01'>Januari</option>
							<option value='02'>Februari</option>
							<option value='03'>Maret</option>
							<option value='04'>April</option>
							<option value='05'>Mei</option>
							<option value='06'>Juni</option>
							<option value='07'>Juli</option>
							<option value='08'>Agustus</option>
							<option value='09'>September</option>
							<option value='10'>Oktober</option>
							<option value='11'>November</option>
							<option value='12'>Desember</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<!--	<button type="submit" id="tampilkan_pns" onclick="tampilkan();" class="btn btn-primary">Tampilkan</button> -->
					<button type="submit" id="cetak_rekap1" onchange="Cetak_pns()" onclick="cetak_rekap();" class="btn btn-danger">Cetak</button>
				</div>
			</form>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered" id="rekap_konsultasi" width="100%">
					<thead>
						<tr>
							<th width="1%">
								<center>No</center>
							</th>
							<th width="12%">
								<center>Nama</center>
							</th>
							<th width="17%">
								<center>Alamat</center>
							</th>
							<th width="7%">
								<center>No.Telepon</center>
							</th>
							<th width="7%">
								<center>KTP</center>
							</th>
							<th width="8%">
								<center>Tanggal Permohonan</center>
							</th>
							<th width="10%">
								<center>Jenis Informasi</center>
							</th>
							<th width="10%">
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

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#rekap_konsultasi').DataTable();
	});
</script>

<script type="text/javascript" language="javascript">
	function tampilkan() {
		postData = $('#form-tampil-rekap').serialize();
		var t = $('#rekap_konsultasi').DataTable();
		$.ajax({
			url: '<?php echo base_url("AdminControl/get_rekap_bulan_konsultasi") ?>',
			type: "GET",
			data: postData,

			beforeSend: function() {
				t.clear().draw();
			},

			success: function(ajaxData) {

				$("#cetak_rekap1").show();

				t.clear().draw();
				var data = JSON.parse(ajaxData);

				for (var i = 0; i < data.length; i++) {

					var btn1 = '<a href="http://localhost/pengadilan/CetakControl/generatePDFFile?id=' + data[i]['no_konsul'] + '" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="font-size:5;"><i class="fa fa-download"></i> Cetak</a>';

					var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='100' height='70'>";
					//	HTMLbuilder = HTMLbuilder + imgHtml;
					if (data[i]['status'] == "terima") {
						status = "<b>DITERIMA</b>";
					} else {
						status = "<b>DITOLAK</b>";
					}
					t.row.add([
						"<center>" + [i + 1] + "</center>",
						"<center>" + data[i]['nama_permohon'] + "</center>",
						"<center>" + data[i]['alamat'] + "</center>",
						"<center>" + data[i]['no_telepon'] + "</center>",
						"<center>" + imgHtml + "</center>",
						"<center>" + data[i]['tanggal_permohonan'] + "</center>",
						"<center>" + data[i]['jenis_informasi'] + "</center>",
						//"<center>" + status + "</center>",
						"<center>" + btn1 + "</center>",
					]).draw();
				}
			},
			error: function(status) {
				t.clear().draw();
			}
		});
	}

	function cetak_rekap() {
		bulan = $('#bulan').val();
		tahun = $('#tahun').val();

		window.open("<?php echo base_url(); ?>CetakControl/generate_RekapPDF/" + bulan + '/' + tahun, '_blank');
	}

	$('#rekap_konsultasi').ready(function() {
		var c = $('#rekap_konsultasi').DataTable();
		$("#cetak_rekap1").hide();
		load_data();

		function load_data() {
			$.ajax({

				url: '<?php echo site_url("AdminControl/get_rekap_konsultasi") ?>',
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();
					var HTMLbuilder = "";
					for (var i = 0; i < data.length; i++) {
						//var btn1 = '<a href = "#" target="_blank" name="btn_cetak" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-primary btn_cetak">Cetak PDF</a>';
						//	var btn2 = '<button type="button" name="btn_delete" id="' + data[i]['no_konsul'] + '" class="btn btn-xs btn-danger btn_tolak">Ditolak</button>';
						//	var btn2 = '<a href="<?php echo site_url('CetakControl/generatePDFFile') ?>" target="_blank" class="pull-right btn btn-primary btn-xs" style="margin: 2px;"><i class="fa fa-plus"></i> Cetak PDF</a>';

						var btn1 = '<a href="http://localhost/pengadilan/CetakControl/generatePDFFile?id=' + data[i]['no_konsul'] + '" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="font-size:5;"><i class="fa fa-download"></i> Cetak</a>';

						var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='100' height='70'>";
						//	HTMLbuilder = HTMLbuilder + imgHtml;
						if (data[i]['status'] == "terima") {
							status = "<b>DITERIMA</b>";
						} else {
							status = "<b>DITOLAK</b>";
						}

						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + data[i]['nama_permohon'] + "</center>",
							"<center>" + data[i]['alamat'] + "</center>",
							"<center>" + data[i]['no_telepon'] + "</center>",
							"<center>" + imgHtml + "</center>",
							"<center>" + data[i]['tanggal_permohonan'] + "</center>",
							"<center>" + data[i]['jenis_informasi'] + "</center>",
							//"<center>" + status + "</center>",
							"<center>" + btn1 + "</center>",
						]).draw();
					}
				}
			});
		}

		$(document).on("click", ".btn_cetak", function() {
			var no_konsul = $(this).attr('id');

			$.ajax({
				url: "<?php echo site_url('CetakControl/generatePDFFile') ?>",
				method: "POST",
				data: {
					no_konsul: no_konsul
				},
				success: function(data) {
					//load_data();
				}
			});
		});
	});
</script>