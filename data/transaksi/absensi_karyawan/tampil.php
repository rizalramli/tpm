<?php 
$id_karyawan = $_SESSION['kode_user_karyawan'];
date_default_timezone_set('Asia/Jakarta');
$sekarang = date('Y-m-d');
$hari = date('l'); //Sunday
if(isset($_GET['aksi']))
{
    $id_karyawan = $_GET['aksi'];
    $query_insert = mysqli_query($koneksi,"INSERT INTO detail_absensi (id_detail_absensi,id_karyawan,tgl_absensi) VALUES (NULL,'$id_karyawan','$sekarang')");
    if($query_insert)
    {
        $query_detail = mysqli_query($koneksi,"SELECT * FROM detail_karyawan JOIN karyawan USING(id_karyawan) WHERE id_karyawan='$id_karyawan' AND id_kriteria='C03'");
        foreach($query_detail as $data_detail)
        {
            $id_detail_karyawan = $data_detail['id_detail_karyawan'];
            $value_kriteria = $data_detail['value_kriteria'];
        }
        $value_kriteria = $value_kriteria + 1;
        $query_update = mysqli_query($koneksi,"UPDATE detail_karyawan SET value_kriteria='$value_kriteria' WHERE id_detail_karyawan='$id_detail_karyawan'");
        if($query_update)
        {
            echo "<script>window.location = 'karyawan.php?halaman=absensi'</script>";
        }
    }
}
?>
<div class="container-fluid">
    <h3 class="page-title">Tanggal <?php echo date('d F Y',strtotime($sekarang)) ?></h3>
    <div class="panel panel-headline">
        <div class="panel-body">
        <?php 
        $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan' AND id_karyawan NOT IN (SELECT id_karyawan FROM detail_absensi WHERE tgl_absensi='$sekarang') ORDER BY nama_karyawan ASC") ;
        $count = mysqli_num_rows($query);
        if($hari == "Sunday")
        {
        ?>
            <h2 class="text-center">Hari Ini Tidak Ada Absensi</h2>
        <?php
        }
        else if($count != 0)
        {
        ?>
            <?php
            foreach ($query as $data) :
            ?>
            <table class="table">
                <tr>
                    <td style="width:20%"><h4>Nama Karyawan</h4></td>
                    <td style="width:2%"><h4>:</h4></td>
                    <td><h4><?php echo $data['nama_karyawan'] ?></h4></td>
                </tr>
                <tr>
                    <td style="width:20%"><h4>Alamat</h4></td>
                    <td style="width:2%"><h4>:</h4></td>
                    <td><h4><?php echo $data['alamat'] ?></h4></td>
                </tr>
                <tr>
                    <td style="width:20%"><h4>No Hp</h4></td>
                    <td style="width:2%"><h4>:</h4></td>
                    <td><h4><?php echo $data['no_hp'] ?></h4></td>
                </tr>
                <tr>
                    <td style="width:20%"><h4>Username Anda</h4></td>
                    <td style="width:2%"><h4>:</h4></td>
                    <td><h4><?php echo $data['username'] ?></h4></td>
                </tr>
                <tr>
                    <td style="width:20%;">
                        <a onclick="return confirm('Yakin ingin melakukan absensi ?')" href="?halaman=absensi&aksi=<?= $data['id_karyawan'] ?>" class="btn btn-sm btn-info">Lakukan Absensi</a>
                    </td>
                    <td style="width:2%"><h4></h4></td>
                    <td><h4></td>
                </tr>
            </table>
            <?php endforeach; ?>
            
            <?php
            } else {
            ?>

            <h2 class="text-center">Anda Telah Melakukan Absensi Hari Ini. Terima Kasih</h2>
            <?php
            }
            ?>
        </div>
    </div>
</div>


