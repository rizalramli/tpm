<?php
    include "koneksi/koneksi.php";
    $sel_prov="SELECT * FROM detail_karyawan JOIN karyawan USING(id_karyawan) WHERE id_kriteria='C02' AND id_karyawan='".$_POST["karyawan"]."'";
    $q=mysqli_query($koneksi,$sel_prov);
    foreach ($q as $data_prov) :
    ?>
    <br>    
        <option value="<?php echo $data_prov["value_kriteria"] ?>"><?php echo $data_prov["value_kriteria"] ?></option><br>
    <?php
    endforeach;
    ?>