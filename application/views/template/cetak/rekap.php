<?php $date = date('Y'); ?>

<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekapan Konsultasi Bulan Ke - <?php echo $bulan ?> Tahun <?php echo $tahun ?> </h1>

    <!-- DataTales Example -->


    <div class="table-responsive">
        <table class="table table-bordered" border="1" id="rekap_konsultasi" width="100%">
            <thead>
                <tr>
                    <td>
                        <center>No</center>
                    </td>
                    <td>
                        <center>Nama</center>
                    </td>
                    <td>
                        <center>Alamat</center>
                    </td>
                    <td>
                        <center>No.Telepon</center>
                    </td>
                    <td>
                        <center>Tanggal Permohonan</center>
                    </td>
                    <td>
                        <center>Jenis Informasi</center>
                    </td>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($list as $row) :

                    ?>
                    <tr>

                        <td>
                            <center><?php echo $i + 1 ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['nama_permohon'] ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['alamat'] ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['no_telepon'] ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['tanggal_permohonan'] ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['jenis_informasi'] ?></center>
                        </td>

                    </tr>
                    <?php
                    $i++;
                endforeach ?>
            </tbody>
        </table>
    </div>


</div>