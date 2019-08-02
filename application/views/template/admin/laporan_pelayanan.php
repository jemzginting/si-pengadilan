<?php $date = date('Y'); ?>

<div class="container">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Chat Laporan Pelayanan</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Chat Laporan Pelayanan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="chat_pelayanan" width="100%">
					<thead>
						<tr>
							<th width="10%">
								<center>NO</center>
							</th>
							<th width="95%">
								<center>Kotak Masuk</center>
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

<script type="text/javascript" language="javascript">
	$('#chat_pelayanan').ready(function() {
		var c = $('#chat_pelayanan').DataTable();
		load_data();

		function load_data() {
			$.ajax({

				url: "<?php echo site_url('AdminControl/get_name_chat') ?>",
				dataType: "JSON",
				success: function(data) {
					c.clear().draw();
					var HTMLbuilder = "";
					for (var i = 0; i < data.length; i++) {
						//var btn1 = '<button type="button"   id="' + data[i]["id_user"] + '" name="' + data[i]["name"] + '" class="btn btn-xs btn btn-light btn_chat"><i class="far fa-comment"></i>' + data[i]["name"] + '</button>';
						var btn1 = '<a href="http://localhost/pengadilan/AdminControl/chat_pelanggan?id=' + data[i]["id_user"] + '&name=' + data[i]["name"] + '"   target="_blank" type="button" class="btn btn-xs btn btn-light btn_chat"><i class="far fa-comment"></i>' + data[i]["name"] + '</a>';
						//	var imgHtml = "<img src='../assets/img/" + data[i]['ktp'] + "' width='150' height='100'>";
						//	HTMLbuilder = HTMLbuilder + imgHtml;
						c.row.add([
							"<center>" + [i + 1] + "</center>",
							"<center>" + btn1 + "</center>",
						]).draw();
					}
				}
			});
		}

		$(document).on("click", ".btn_chat", function() {
			var id_user = $(this).attr('id');
			var name = $(this).attr('name');
			$.ajax({
				url: "<?php echo site_url('AdminControl/chat_pelanggan'); ?>",
				method: "POST",
				data: {
					id_user: id_user,
					name: name
				},
				success: function(data) {
					//load_data();

				}
			});

		});



	});
</script>