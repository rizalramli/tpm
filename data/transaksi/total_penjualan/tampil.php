<?php 
if(isset($_POST['update']))
{
    $id_karyawan = $_POST['karyawan'];
    $total_penjualan = $_POST['total_penjualan'];
    $total_penambahan = $_POST['total_penambahan'];
    $total_semua = $total_penambahan + $total_penjualan;
    echo $id_karyawan;
    $query_update = mysqli_query($koneksi,"UPDATE detail_karyawan SET value_kriteria='$total_semua' WHERE id_kriteria='C02' AND id_karyawan='$id_karyawan'");
    if ($query_update) {
        echo "<script>window.location = 'admin.php?halaman=total_penjualan'</script>";
    }
}
?>
<div class="container-fluid">
    <h3 class="page-title">Total Penjualan Tiap Karyawan</h3>
    <div class="panel panel-headline">
        <div class="panel-body">
        <a style="cursor:pointer;margin-bottom:10px" class="btn btn-sm btn-info text-white" data-toggle="modal"
                                data-target="#modal-tambah">Tambah</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Karyawan</th>
                        <th class="text-center">Total Barang Berhasil Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM detail_karyawan JOIN karyawan USING(id_karyawan) WHERE id_kriteria='C02' ORDER BY value_kriteria DESC");
                    foreach ($query as $data) :
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_karyawan'] ?></td>
                        <td class="text-right"><?php echo $data['value_kriteria']." Barang" ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="modal-tambah" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inputEmail2">Cari Karyawan </label>
                                <select name="karyawan" id="karyawan" class="form-control form-control-sm" required>
                                    <option value="">-- Cari Karyawan --</option>
                                <?php 
                                $query2 = mysqli_query($koneksi, "SELECT * FROM detail_karyawan JOIN karyawan USING(id_karyawan) WHERE id_kriteria='C02' ORDER BY value_kriteria DESC");
                                foreach ($query2 as $data2) :
                                ?>
                                <option value="<?php echo $data2['id_karyawan'] ?>"><?php echo $data2['nama_karyawan'] ?></option>
                                <?php endforeach; ?>
                                </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="inputEmail2">Total Penjualan Saat ini</label>
                                <select name="total_penjualan" id="total_penjualan" class="form-control form-control-sm" required>
                                
                                </select>
                                
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Total Penambahan</label>
                            <input type="text" class="form-control form-control-sm" name="total_penambahan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="update" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
