<?php
$tgl = date('Y-d-m');
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<table border="">
				<tr>
					<td rowspan="3" width="100"><img src="<?= base_url('assets/'); ?>img/download.png" style="width:87px; height:110px;"></td>
					<td width="700"></td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			<h3 align="center">
				PENGADILAN TINGGI AGAMA KOTA PALEMBANG
			</h3>
			<h3 align="center">
				Instrumen Bukti Pengajuan Permohonan
			</h3>
			<h6 align="center">
				Jl. Pangeran Ratu, 5 Ulu, Kecamatan Seberang Ulu I, Kota Palembang, Sumatera Selatan 30257
				</h5>
				<hr />
				<hr />
				<h4 align="center">
					BUKTI PENGAJUAN PERMOHONAN INFORMASI
				</h4>
				<h4 align="center">
					Model A - Untuk Prosedur Biasa
				</h4>
				<p></p>
				<p></p>
				<table cellpadding="4">
					<tr>
						<td width="250">Tanggal Permohonan</td>
						<td width="600" align="left">: <?php print $getInfo['tanggal_permohonan']; ?></td>
					</tr>
					<tr>
						<td width="250">Tanggal Pemberitahuan</td>
						<td width="600" align="left">: <?php print $tgl; ?></td>
					</tr>
					<tr>
						<td width="250">No.Pendaftaran</td>
						<td width="600" align="left">: <?php print $getInfo['no_konsul']; ?></td>
					</tr>
					<br>
				</table>
				<table cellpadding="2">
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
				</table>
				<table cellpadding="4">
					<tr>
						<td width="250">Nama</td>
						<td width="600" align="left">: <?php print $getInfo['nama_permohon']; ?></td>
					</tr>
					<tr>
						<td width="250">Alamat</td>
						<td width="600" align="left">: <?php print $getInfo['alamat']; ?></td>
					</tr>

				</table>
				<table cellpadding="2">
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
				</table>
				<table cellpadding="4">
					<tr>
						<td width="250">Pekerjaan</td>
						<td width="600" align="left">: <?php print $getInfo['pekerjaan']; ?></td>
						<!-- <td width="600" align="left">: <?php print ['pekerjaan']; ?></td>-->
					</tr>
					<tr>
						<td width="250">Nomor Telepon</td>
						<td width="600" align="left">: <?php print $getInfo['no_telepon']; ?></td>
					</tr>
					<tr>
						<td width="250">Tujuan Informasi</td>
						<td width="600" align="left">: <?php print $getInfo['tujuan_informasi']; ?></td>
					</tr>
				</table>
				<table cellpadding="2">
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
				</table>
				<table cellpadding="4">
					<tr>
						<td width="250">Cara memperoleh Informasi</td>
						<td width="600" align="left">: <span style="font-size: 18px;">O</span> Melihat/Membaca/Mendengarkan</td>
					</tr>
					<tr>
						<td width="250"></td>
						<td width="600" align="left">&nbsp; <span style="font-size: 18px;">O</span> Mendapatkan Salinan Informasi</td>
					</tr>
					<tr>
						<td width="250">(Softcopy/Hardcopy)****</td>
						<td width="600" align="left"></td>
					</tr>
					<tr>
						<td width="250">Cara Mendapatkan Informasi</td>
						<td width="600" align="left">: <span style="font-size: 18px;">O</span> Mengambil Langsung &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 18px;">O</span> Email</td>
					</tr>
				</table>
				<table cellpadding="2">
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
				</table>
				<table cellpadding="3">
					<tr>
						<td width="200"></td>
						<td width="200"></td>
						<td width="200" align="center">Palembang, ...............</td>
					</tr>
					<tr>
						<td width="200" align="center">Petugas Informasi</td>
						<td width="200"></td>
						<td width="200" align="center"> Pemohon Informasi</td>
					</tr>
				</table>
				<table cellpadding="2">
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
				</table>
				<table cellpadding="3">
					<tr>
						<td width="200" align="center">(.................)</td>
						<td width="200"></td>
						<td width="200" align="center">(.................)</td>
					</tr>
				</table>
				<table cellpadding="2">
					<tr>
						<td width="250"></td>
						<td width="600" align="left"></td>
					</tr>
				</table>
				<font size="6">
					<table cellpadding="2">
						<tr>
							<td width="500" align="left">Keterangan</td>
						</tr>
						<tr>
							<td width="500" align="left">* Diisi oleh Petugas</td>
						</tr>
						<tr>
							<td width="600" align="left">* Diisi oleh petugas berdasarkan nomor registrasi permohonan
								Informasi Publik yang terdaftar dalam Buku RegisterPermohonan Informasi</td>
						</tr>
						<tr>
							<td width="500" align="left">* Pilih salah satu dengan memberi tanda (√)</td>
						</tr>
						<tr>
							<td width="500" align="left">* Coret yang tidak perlu</td>
						</tr>
					</table>
				</font>
		</div>
	</div>
</div>