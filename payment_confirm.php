<?php
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: index.php');
}

function ListPesananSaya()
{
  // buka database
  include("proses/db_connect.php");
  
  // cari id customer berdasarkan session
  $email = $_SESSION["login_email"];
  $query = "SELECT id_m_customer FROM m_customer WHERE email_customer='$email'";
  $result = mysqli_query($db_connect, $query);
  list($id_pelanggan) = mysqli_fetch_array($result);
  
  // ambil semua bungkus yang dimiliki id customer ini
  $query = "SELECT * FROM m_bungkus WHERE id_customer='$id_pelanggan'";
  $result = mysqli_query($db_connect, $query);
  // list($no_order, $id_pelanggan, $nama_pelanggan, $kontak, $alamat) = mysqli_fetch_array($result);
  $row = mysqli_fetch_assoc($result);

  mysqli_close($db_connect);

  // mengembalikan array assoc m_bungkus
  return $row;
}

function IsiBungkus($id_bungkus)
{
  // buka database
  include("proses/db_connect.php");
  $id = $_SESSION["id_m_customer"];
  // ambil isi bungkus (pemesanan)
  $query = "SELECT a.id_bungkus, a.tanggal_pemesanan,  b.id_customer, a.status_pemesanan FROM m_pemesanan a 
  JOIN m_bungkus b where a.id_bungkus = b.id_bungkus AND a.status_pemesanan = 0 OR a.status_pemesanan = 1 AND b.id_customer = $id GROUP BY a.id_bungkus ORDER BY a.status_pemesanan DESC;";
  $result = mysqli_query($db_connect, $query);


  mysqli_close($db_connect);

  // mengembalikan array assoc m_pemesanan
  return $result;
}

function IsiBungkus_totalharga($id_bungkus)
{
  // buka database
  include("proses/db_connect.php");

  // ambil isi bungkus (pemesanan)
  $query = "SELECT * FROM m_pemesanan WHERE id_bungkus='$id_bungkus'";
  $result = mysqli_query($db_connect, $query);
  $total = 0;

  while(list($id_pesanan, $id_produk, $total_produk, $status, $tanggal_pesan, $id_bungkus) = mysqli_fetch_array($result)){
    $query = "SELECT price_product FROM m_product WHERE id_m_product='$id_produk'";
    $result1 = mysqli_query($db_connect, $query);
    list($harga_produk) = mysqli_fetch_array($result1);

    $total = $total + ($harga_produk * $total_produk);
  }

  // mengembalikan total harga dari satu bungkus
  return $total;
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
        <div class="container text-center">
          <h1 class="py-3 my-5">Pesanan Saya</h1>
        </div>
       
        <div class="containter m-5 px-5 ">
          <div class="row m-5 d-flex justify-content-center">   
            <!-- Order --> 
            <?php $result = IsiBungkus(isset($_SESSION["id_m_customer"])); ?>
            <?php while ($row =  mysqli_fetch_assoc($result)): ?>
            <div class="card col-lg-10 card mb-3 border rounded-0 ">
              <div class="card-body">
                <div class="row p-1">
                  <div class="col-6 col-lg-2">
                    <!-- Heading -->
                    <h4 class="heading-xxxs text-muted">No Order:</h4>
                    <!-- Text -->
                    <h5><?= $row["id_bungkus"] ?></h5>
                  </div>
                  <div class="col-6 col-lg-3">
                    <!-- Heading -->
                    <h4 class="heading-xxxs text-muted">Tanggal Pesan:</h4>
                    <!-- Text -->
                    <h5> <?= $row["tanggal_pemesanan"] ?> </h5>

                  </div>
                  <div class="col-6 col-lg-2">
                    <!-- Heading -->
                    <h4 class="heading-xxxs text-muted">Status:</h4>
                    <!-- Text -->
                    <?php if ($row["status_pemesanan"] == 0){

                      echo '<h5 class="text-warning">Belum Dibayar</h5>';
                    } else {
                      echo '<h5 class="text-info">Sudah Dibayar</h5>';
                    }
                    

                    ?>

                  </div>
                  <div class="col-6 col-lg-2">
                    <!-- Heading -->
                    <h4 class="heading-xxxs text-muted">Total Harga:</h4>
                    <!-- Text -->
                    <h5 style="color: red;">Rp. <?= IsiBungkus_totalharga($row["id_bungkus"])  ?></h5>

                  </div>
                  <div class="col-5 col-lg-2 mt-1 m-auto d-grid text-center">
                    <a href=<?= '"summary.php?no_order=' . $row["id_bungkus"] . '"' ?> class="btn btn-outline-success m-1">Rincian</a>
                    <?php if ($row["status_pemesanan"] == 0){
                       echo "<a href= 'payment_confirm2.php?no_order=" . $row["id_bungkus"] . "' class='btn btn-success m-1'>Bayar</a>";
                      } 
                    ?>
                   
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile ?>
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