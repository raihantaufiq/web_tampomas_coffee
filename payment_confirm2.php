<?php
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: index.php');
}

include("proses/db_connect.php");

if (isset($_GET["no_order"])){

  $id = $_GET["no_order"];
  $query =  "SELECT a.id_bungkus, a.id_customer,  a.nama, b.email_customer, a.kontak FROM m_bungkus a 
          JOIN m_customer b where a.id_customer = b.id_m_customer AND a.id_bungkus = '$id';";
  $result = mysqli_query($db_connect, $query);
  $result = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Tampomas Coffee</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/image/favicon-16x16.png" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Public Sans'>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <!-- Responsive navbar-->
        <!-- navbar sudah login -->
        <?php if (isset($_SESSION["login_email"])) { ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <div class="container-fluid">
              <a href="index.php" class="navbar-brand mx-3 my-2"><img src="assets/image/logo.png" alt="logo" style="width: 180px;"></a>

                <div class="nav mx-auto">
                  <a href="index.php" class="nav-item me-3">Beranda</a>
                  <a href="product.php" class="nav-item me-3">Belanja</a>
                  <a href="blog.php" class="nav-item me-3">Blog</a>
                  <a href="about.php" class="nav-item me-3 ">Tentang Kami</a>
                  <a href="payment_confirm.php" class="nav-item me-3 nav-active">Konfirmasi Pembayaran</a>
                </div>

                <div class="nav">
                  <div class="link account">
                    <a href="profile.php"><span class="iconify me-3" data-icon="clarity:avatar-line" data-width="30" data-height="30" style="color: #1b2223;"></span></a>
                  </div>
                  <div class="link chart">
                    <a href="cart.php"><span class="iconify me-3" data-icon="la:shopping-bag" data-width="30" data-height="30" style="color: #1b2223;"></span></a>
                  </div>
                  <div class="link logout">
                    <a href="proses/logout_p.php"><span class="iconify" data-icon="ion:log-out-outline" data-width="30" data-height="30" style="color: #d60000;"></span></a>
                  </div>
                </div>
          </div>
        </nav>
        <?php } ?>
        <!-- Header-->

        <!-- isi -->
        <div class="container text-center py-3 my-5">
            <h1 >Konfirmasi Pembelian</h1>
            <a href="payment_confirm.php"><h class=" primary nav-active text-center col-5"style="font-size: 20px;">Kembali</h></a>
          </div>
          
          <div class="container px-5 mb-5">
            <form class="row g-4 px-5" action="proses/add_payment_confirm.php" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="payment" class="form-label">No Order</label>
                  <input type="text" class="form-control rounded-0 border-dark" id="nama" name="id_bungkus" value=<?= $result["id_bungkus"]  ?> readonly>
                </div>
                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control rounded-0 border-dark" id="nama" name="pay_name" value=<?=$result["nama"]  ?>>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">*Email</label>
                  <input type="email" class="form-control rounded-0 border-dark" id="email" name="pay_email" value=<?=$result["email_customer"]  ?>>
                </div>
                <div class="col-12">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <input type="tel" class="form-control rounded-0 border-dark" id="phone"  name="pay_phone" value=<?=$result["kontak"]  ?>>
                </div>
                <div class="col-12">
                  <label for="tgl_transfer" class="form-label">*Tanggal Transfer</label>
                  <input type="date" class="form-control rounded-0 border-dark" id="tgl_transfer"  name="pay_tanggal">
                </div>
                <div class="col-12">
                  <label for="bank" class="form-label">*Pilih Bank Transfer</label>
                  <select id="bank" class="form-select rounded-0 border-dark" name="pay_method">
                    <option selected disabled value=""></option>
                    <option>BNI</option>
                    <option>BRI</option>
                    <option>BSI</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="bukti_bayar" class="form-label">Bukti Bayar</label>
                  <input type="file" class="form-control rounded-0 border-dark" id="bukti_bayar" name="image">
                </div>
                <div class="col-12">
                  <label for="message" class="form-label">Pesan</label>
                  <textarea class="form-control rounded-0 border-dark" id="message" rows="3" name="pay_ket"></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-success" name="add">Kirim</button>
                </div>
            </form>
        </div>
        </div>
        
        <!-- Footer -->
        <section class="bg-light text-dark py-5 mx-auto">
          <div class = "container px-5">
              <div class = "row gx-5">
                  <div class = "col-lg-3 mb-5 mb-lg-0">
                      <h2 class = "h5 px-1">Akses Cepat</h2>
                      <a class = "row link-dark text-decoration-none px-3 py-2" href = "about.php">Tentang Kami</a>
                      <a class = "row link-dark text-decoration-none px-3 py-2" href = "product.php">Belanja</a>
                      <a class = "row link-dark text-decoration-none px-3 py-2" href = "blog.php">Blog</a>
                      <a class = "row link-dark text-decoration-none px-3 py-2" href = "#">Cara Pembayaran</a>
                  </div>
                  <div class = "col-lg-4 mb-5 mb-lg-0">
                      <h2 class = "h5">Toko</h2>
                      <p>Dusun Padasari, RT 05/RW 03, Desa Pangadegan, 
                        Kecamatan Rancakalong, Kabupaten Sumedang 45361.</p>
                  </div>
                  <div class = "col mb-5 mb-lg-0">
                      <h2 class = "h5">Hubungi Kami</h2>
                      <p>Phone : +62811111111</p>
                      <p>Email:
                        TampomasCoffee@gmail.com
                      </p>
                      <!--
                      <form action="#" method="POST">
                        <div class="form-floating mb-2">
                          <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                          <label for="floatingInput">Alamat Email</label>
                        </div>
                        <div class="form-floating mb-3">
                          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; resize: none;"></textarea>
                          <label for="floatingTextarea2">Pesan</label>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <button class="btn btn-success btn-login px-4" type="submit">Kirim</button>
                        </div>
                      </form>
                      -->
                  </div>
              </div>
            </div>
        </section>
        
        <footer class="py-1 ">
          <div class="pt-lg-2 pt-2 footer bg-white">
            <div class="container">
              <div class="row">

                <div class="align-items-center g-0 border-top py-2 mt-6 row">
                  <div class="col-lg-4 col-md-5 col-sm-12">
                    <span class="iconify" data-icon="bi:whatsapp" data-width="30" data-height="30"></span>
                    <span class="iconify" data-icon="ant-design:instagram-outlined" data-width="36" data-height="36"></span><br>
                    <p class="text-dark mt-2" style="font-size: 10px;">© 2022, TampomasCoffee</p>
                  </div>
                  </div>
                </div>
              </div>
          </div>
        </footer>
        
        <!-- iconify js -->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>