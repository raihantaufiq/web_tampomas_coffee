<?php

// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
}
// buka database (buat koneksi ke database)
// include("../proses/db_connect.php");

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

<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Tampomas - Admin</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style.admin.css">
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
       
    </head>
    <body classname='snippet-body' class="body-pd">
        <body id="body-pd">
            <header class="header body-pd" id="header">
                <div class="header_toggle ">
                    <i class='bx bx-x bx-menu' id="header-toggle"></i>
                </div>
                <div class="row align-items-center " style="color:#204D48;">
                    <div class="col">
                        <h7>|</h7>
                    </div>
                    <!-- NANA ADMIN SAMA GAMBARNYA BISA DI GANTI GANTI -->
                    <div class="col ">
                        <a href="profile-admin.php" style="text-decoration: none; color: #204D48;">
                            <h7><?= $_SESSION["nama_admin"] ?></h7>
                        </a>
                    </div>
                <!-- NANA ADMIN SAMA GAMBARNYA BISA DI GANTI GANTI -->
                </div>
                
            </header>
            <div class="l-navbar show" id="nav-bar">
                <nav class="nav">
                    <div>
                        <a href="dashboard.php" class="nav_logo">
                            <img src="images-admin/Tampomas-Light.png" style="padding-right: -35%;"alt="logo">
                            <img src="images-admin/Text-only.png" alt="text">
                        </a>
                        <div class="nav_list">
                            <a href="dashboard.php" class="nav_link ">
                                <i class="iconify" data-icon="fa:pie-chart"></i>
                                <span class="nav_name">Dashboard</span>
                            </a>
                            <a href="Produk.php" class="nav_link">
                                <i class="iconify" data-icon="fa-solid:ticket-alt"></i>
                                <span class="nav_name">Produk</span>
                            </a>
                            <a href="blog-admin.php" class="nav_link ">
                                <i class="iconify" data-icon="jam:write-f"></i>
                                <span class="nav_name">Blog</span>
                            </a>
                            <a href="Pembayaran.php" class="nav_link">
                                <i class="iconify" data-icon="carbon:order-details"></i>
                                <span class="nav_name">Pembayaran</span>
                            </a>
                            <a href="pengiriman.php" class="nav_link ">
                                <i  class="iconify" data-icon="ri:send-plane-fill"'></i>
                                <span class="nav_name">Pengiriman</span>
                            </a>
                            <a href="fraud.php" class="nav_link active">
                                <i class="iconify" data-icon="fluent:calendar-cancel-20-filled"></i>
                                <span class="nav_name">Transakasi Fraud</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <!--Container Main start-->
            <div class="py-3">
                <h3 class="text-center pb-3 ">Transaksi Fraud</h3>
                <div class="card p-2">
                    <div class="card-body py-4">
                      <div class="col d-flex justify-content-end pb-5">
                          <span class="iconify" data-icon="akar-icons:search"></span>   
                      </div>
                      <table class="table table-striped table-hover">
                        <thead >
                            <tr>
                              <th>Nomor Order</th>
                              <th>Nama Pemesan</th>
                              <th>Tanggal</th>
                              <th>Total Harga</th>
                              <th>Detail</th>
                              <th>Bukti Bayar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            // buka database
                            include("proses/db_connect.php");
                            // ambil isi bungkus (pemesanan)
                            $query = "SELECT id_bungkus, status_pemesanan, tanggal_pemesanan FROM m_pemesanan WHERE status_pemesanan=-1 GROUP BY id_bungkus DESC";
                            $result = mysqli_query($db_connect, $query);

                            while ($row_pemesanan = mysqli_fetch_assoc($result)) {
                                $id_bungkus = $row_pemesanan['id_bungkus'];
                                $query = "SELECT * FROM m_bungkus WHERE id_bungkus='$id_bungkus'";
                                $result2 = mysqli_query($db_connect, $query);
                                list($id_bungkus, $id_customer, $nama_customer, $kontak, $alamat) = mysqli_fetch_array($result2);
                            // 
                            ?>
                                <!-- while -->
                                <tr>
                                    <td><?= $id_bungkus ?></td>
                                    <td><?= $nama_customer ?></td>
                                    <td><?= $row_pemesanan['tanggal_pemesanan'] ?></td>
                                    <td><?= 'Rp '. number_format(IsiBungkus_totalharga($id_bungkus), 0, ',', '.'); ?></td>
                                    <td><a href="../summary.php?no_order=<?= $id_bungkus ?>">summary</a></td>
                                    <?php
                                     $query = "SELECT id_bungkus FROM m_payment_verif WHERE id_bungkus=$id_bungkus";
                                     $result3 = mysqli_query($db_connect, $query);

                                     if($row = mysqli_fetch_assoc($result3)){
                                        ?> <td><a href="detail_bukti_bayar.php?id_bungkus=<?= $id_bungkus ?>">Detail</a></td>
                                        <?php
                                     }else{
                                         ?> <td></td> <?php
                                     }
                                    ?>
                                   
                                    
                                </tr>
                                <!-- end while -->
                            <?php } ?>
                    </div>
                </div>
            </div>
            <!--Container Main end-->
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>          
            <script type='text/javascript' src='admin.js'></script>

        </body>
</html>