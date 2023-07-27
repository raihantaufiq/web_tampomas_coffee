<?php
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: index.php');
}

// cek form
if (isset($_GET['no_order'])) {
  $no_order  = $_GET['no_order'];
} else {
  header('location: index.php');
}

// buka database
include("proses/db_connect.php");
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
                  <a href="payment_confirm.php" class="nav-item me-3">Konfirmasi Pembayaran</a>
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

        <div class="bg-image"
              style="background-image: url('assets/image/thank.png');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center center;
              "
            >
            <div class="p-5 text-center shadow-1-strong rounded text-white" style="background-color: rgba(118, 118, 118, 0.43);">
              <div class="container py-5 my-5">
                <div class="align-items-center g-0 row ">
                    <div class="py-5 py-lg-0">
                      <h4 class="text-white fw-semi-bold" style="font-family: 'Public Sans'; font-size: 72px; letter-spacing: -3px;">Terima Kasih!</h4>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Isi -->
        <div class="container px-0 px-lg-3 mb-5">

            <?php
            // ambil bungkus berdasarkan id nya
            $query = "SELECT * FROM m_bungkus WHERE id_bungkus='$no_order'";
            $result = mysqli_query($db_connect, $query);
            list($no_order, $id_pelanggan, $nama_pelanggan, $kontak, $alamat) = mysqli_fetch_array($result);
            // ambil tanggal pemesanan
            $query = "SELECT tanggal_pemesanan FROM m_pemesanan WHERE id_bungkus='$no_order'";
            $result = mysqli_query($db_connect, $query);
            list($tanggal_pesan) = mysqli_fetch_array($result);
            ?>
            
            <div class="row justify-content-between mt-5">
              <div class="col-5">
                <div class="container border border-dark">
                    <h2 class="full-typeface fw-bold my-4">Rincian Pesanan</h2>
                    <div class="row justify-content-start pt-5">
                      <div class="col-5">
                        <h5>Nomor Order</h5>
                      </div>
                      <div class="col-6">
                        <h5 class="text-end"><?php echo $no_order?></h5>
                      </div>
                    </div>
                    <hr>
                    <div class="row justify-content-start pt-5">
                        <div class="col-5">
                          <h5>Tanggal</h5>
                        </div>
                        <div class="col-6">
                          <h5 class="text-end"><?php echo $tanggal_pesan?></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-start pt-5">
                        <div class="col-5 pb-2">
                          <h5>Metode Pembayaran</h5>
                        </div>
                        <div class="col-6">
                          <h6 class="text-end">Manual Transfer</h6>
                        </div>
                    </div>
                </div>
                <h2 class="full-typeface fw-bold my-5">Informasi</h2>
                <div class="form-floating mb-2">
                  <input name="Nama" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $nama_pelanggan?>" readonly>
                  <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-2">
                  <input name="Contact" type="Contact" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $kontak?>" readonly>
                  <label for="floatingInput">Kontak</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; resize: none;" readonly><?php echo $alamat?></textarea>
                  <label for="floatingTextarea2">Kirim Ke</label>
                </div>
              </div>
              
              <div class="col-6">
                <?php
                $query = "SELECT * FROM m_pemesanan WHERE id_bungkus='$no_order'";
                $result = mysqli_query($db_connect, $query);
                $total = 0;
                while(list($id_pesanan, $id_produk, $total_produk, $status, $tanggal_pesan, $id_bungkus) = mysqli_fetch_array($result)){
                
                ?>
                <!-- while -->
                <div class="row g-0">
                  <?php
                    $query = "SELECT name_product, photo_product, price_product FROM m_product WHERE id_m_product='$id_produk'";
                    $result1 = mysqli_query($db_connect, $query);
                    list($nama_produk, $foto_produk, $harga_produk) = mysqli_fetch_array($result1);
                  ?>
                  <div class="col-md-3">
                    <img src="assets/image_product/<?php echo $foto_produk?>" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="mt-sm-3 ms-3 pe-4">
                      <h5><b><?php echo $nama_produk?></b></h5>
                      <div class="container">
                        <div class="row justify-content-start">
                          <div class="col-5">
                            <h6>Qty <?php echo $total_produk?></h6>
                          </div>
                          <div class="col-6" style="color:rgba(0, 0, 0, 0.4);">
                            <h6>Rp <?php echo number_format(($total_produk * $harga_produk), 0, ',', '.'); ?></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <?php
                    // hitung total
                  $total = $total + ($harga_produk * $total_produk);
                ?>
                <!-- end while -->
                <?php } ?>
                <div class="container">
                  <div class="row justify-content-start pt-5">
                    <div class="col-5">
                      <h5>Total</h5>
                      <p style="font-size: 12px;">*Harga Belum termasuk Ongkir</p>
                    </div>
                    <div class="col-6" style="color:#B99765;">
                      <h5 class="text-end">Rp <?php echo number_format($total, 0, ',', '.'); ?></h5>
                    </div>
                  </div>
                </div>

                <div class="container mt-5">
                    <p>
                      Terima kasih atas pesanan Anda, Untuk langkah lebih lanjut dan konfirmasi , silakan hubungi  nomor Whatsapp di bawah ini

                    </p>
                    <div class="row align-items-center d-flex justify-content-start">
                        <div class="col-1">
                            <span class="iconify" data-icon="akar-icons:whatsapp-fill" data-width="45" data-height="45"></span>
                        </div>
                        <div class="col px-4">
                            <h4>+62-876-832-732</h4>
                        </div>
                    </div>
                </div>
              </div>
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

<?php
// tutup database
mysqli_close($db_connect);
?>
</html>