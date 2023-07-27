<?php

include 'proses/conf.php';

$result = mysqli_query($conn, "SELECT * FROM m_content");

// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
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
                        <img src="images-admin/Tampomas-Light.png" style="padding-right: -35%;" alt="logo">
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
                        <a href="blog-admin.php" class="nav_link active">
                            <i class="iconify" data-icon="jam:write-f"></i>
                            <span class="nav_name">Blog</span>
                        </a>
                        <a href="Pembayaran.php" class="nav_link">
                            <i class="iconify" data-icon="carbon:order-details"></i>
                            <span class="nav_name">Pembayaran</span>
                        </a>
                        <a href="pengiriman.php" class="nav_link">
                            <i class="iconify" data-icon="ri:send-plane-fill"'></i>
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
                <h3 class="text-center pb-3 ">Blog</h3>
                <div class="card p-2">
                    <div class="card-body py-4">
                      <div class="col d-flex justify-content-between pb-5">
                          <h5>Semua Blog</h5>
                          <span class="iconify" data-icon="akar-icons:search"></span>   
                      </div>
                      <div class="row">
                        <ul class="list-group list-group-flush">
                          
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo '<li class="list-group-item">
                            <div class="row">
                                <div class="col-8">
                                  <div class="mb-sm-3 ms-3 pe-4">                        
                                    <h6 class="pt-2">' . $row['title_content'] . '</h6>
                                    <p style="color: gray;">' . $row['date_content'] . '</p>
                                  </div>
                                </div>
                                <div class="col-4 d-flex justify-content-end align-items-center">
                                <a href="update_blog-admin.php?id=' . $row['idm_content'] . '"><span class="iconify me-4 can-hover" data-icon="fa6-solid:pen"></span></a>
                                <a href="proses/delete_content.php?id=' . $row['idm_content'] . '"><span class="iconify me-2 can-hover" data-icon="fa6-solid:trash"></span></a>
                                </div>
                            </div>
                          </li>';
                        }
                        ?>
                        
                          <li class="list-group-item">
                            <a href="tambah_blog.php" style="text-decoration:none; color: #000;">
                                <div class="row">
                                    <div class="col-1 d-flex align-items-center ms-3" style="height: 80px;">
                                        <span class="iconify" data-icon="akar-icons:plus" data-width="25" data-height="25"></span>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <h7>Tambah Blog Baru</h7>
                                    </div>
                                </div>
                            </a>
                          </li>
                      </ul>
                    </div>
                    </div>
                  </div>
            </div>
            <!--Container Main end-->
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <script type=' text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='admin.js'></script>

    </body>

</html>