<?php 
include "koneksi/koneksi.php";
    if(isset($_POST['simpan']))
    {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
        $cek = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        if($cek > 0)
        {
            if(password_verify($_POST['password'],$data['password']))
            {

                $_SESSION['kode_user'] = $data['kode_user'];
                $_SESSION['username_user'] = $data['username'];
                $_SESSION['nama_user'] = $data['nama_user'];

                header("location:admin.php?halaman=beranda");
            }
            else
            {
            echo "<script>alert('username atau password anda salah');</script>";
            }
        }
        else{
          $query2 = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE username='$username'");
          $cek2 = mysqli_num_rows($query2);
          $data2 = mysqli_fetch_array($query2);
          if($cek2 > 0)
          {
              if(password_verify($_POST['password'],$data2['password']))
              {

                  $_SESSION['kode_user_karyawan'] = $data2['id_karyawan'];
                  $_SESSION['username_user_karyawan'] = $data2['username'];
                  $_SESSION['nama_user_karyawan'] = $data2['nama_karyawan'];

                  header("location:karyawan.php?halaman=beranda");
              }
              else
              {
              echo "<script>alert('username atau password anda salah');</script>";
              }
          }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TPM Wonosobo</title>
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="text-center">TPM</h5>
            <h5 class="text-center mb-4">Wonosobo</h5>
            <form class="form-signin" method="post" action="">
              <div class="form-label-group">
                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required
                  autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                  required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" name="simpan">Sign
                in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/vendor/jquery/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery/jquery.slim.min.js"></script>

</body>

</html>