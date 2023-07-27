<?php

// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
}
// buka database (buat koneksi ke database)
// include("../proses/db_connect.php");

// SELECT a.id_bungkus, b.pay_name, c.resi, a.status_pembelian FROM m_pembelian a JOIN m_payment_verif b ON a.id_bungkus = b.id_bungkus JOIN m_shipping c ON a.id_bungkus = c.id_bungkus GROUP BY a.id_bungkus;
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
                            <a href="pengiriman.php" class="nav_link  active">
                                <i  class="iconify" data-icon="ri:send-plane-fill"'></i>
                                <span class="nav_name">Pengiriman</span>
                            </a>
                            <a href="fraud.php" class="nav_link">
                                <i class="iconify" data-icon="fluent:calendar-cancel-20-filled"></i>
                                <span class="nav_name">Transakasi Fraud</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <!--Container Main start-->
            <div class="py-3">
                <h3 class="text-center pb-3 ">Pengiriman</h3>
                <div class="card p-2">
                    <div class="card-body py-4">
                      <div class="col d-flex justify-content-end pb-5">
                          <span class="iconify" data-icon="akar-icons:search"></span>   
                      </div>
                      <table class="table table-striped table-hover">
                        <thead >
                            <tr>
                              <th>Nomor Order</th>
                              <th>Nama Pembeli</th>
                              <th>Resi</th>
                              <th>Tanggal Pengiriman</th>
                              <!-- <th>Detail</th> -->
                              <th>Status</th>
                              <th>Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // buka database
                            include("proses/db_connect.php");
                            // ambil isi bungkus (pemesanan)
                            $query = "SELECT a.id_bungkus, b.pay_name, c.resi, c.tanggal_pengiriman, a.status_pembelian FROM m_pembelian a JOIN m_payment_verif b ON a.id_bungkus = b.id_bungkus JOIN m_shipping c ON a.id_bungkus = c.id_bungkus GROUP BY a.id_bungkus";
                            $result = mysqli_query($db_connect, $query);
                            echo mysqli_error($db_connect);

                            while ($row_pembelian = mysqli_fetch_assoc($result)) {
                                $id_bungkus = $row_pembelian['id_bungkus'];
                                $nama_pembeli = $row_pembelian['pay_name'];
                                $resi = $row_pembelian['resi'];
                                $tanggal_pengiriman = $row_pembelian['tanggal_pengiriman'];
                                $status_pembelian = $row_pembelian['status_pembelian'];
                            ?>
                            <!-- while -->
                            <tr>
                              <td><?= $id_bungkus ?></td>
                              <td><?= $nama_pembeli ?></td>
                              <td><?= $resi ?></td>
                              <td><?= $tanggal_pengiriman ?></td>
                              <!-- <td></td> -->
                              <?php if ($status_pembelian == 2) { ?>
                                <td><span class="rounded-category-green" style="color:white;">Selesai</span></td>
                                <td></td>
                              <?php }else if($status_pembelian == 1){ ?>
                                <td><span class="rounded-category-yellow" style="color:white;">Proses</span></td>
                                <td><a href="proses/selesai_pengiriman.php?no_order=<?= $id_bungkus ?>">Selesai</a></td>
                              <?php } ?>
                              
                            </tr>
                            <!-- endwhile -->
                            <?php } ?>
                            <!-- <tr>
                                <td>101010110</td>
                                <td>John</td>
                                <td>8682319</td>
                                <td>3466234</td>
                                <td>12345</td>
                                <td>Bandung</td>
                                <td><span class="rounded-category-yellow" style="color:white;">Proses</span><span class="iconify ms-2 can-hover" data-icon="fa6-solid:pen"></span></td>
                                <td><a href="#">Kirim</a> / <a href="#">Batal</a></td>
                            </tr> -->
                          </tbody>
                      </table>
                    </div>
                  </div>
            </div>
            <!--Container Main end-->
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>          
            <script type='text/javascript' src='admin.js'></script>

        </body>
    </html>