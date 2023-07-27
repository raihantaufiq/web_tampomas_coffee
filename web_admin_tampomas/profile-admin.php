<?php

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

<body classname='snippet-body'>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle ">
                <i class='bx bx-menu' id="header-toggle"></i>
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
        <div class="l-navbar" id="nav-bar">
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
                        <a href="blog-admin.php" class="nav_link">
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
                <div class="card p-2">
                    <div class="card-body py-4">
                        <a href="proses/logout.php" class="d-flex justify-content-end" style="text-decoration: none; color: #D19F4B;">Log Out ></a>
                        <div class="px-5 m-5 d-flex justify-content-center">
                            <div class="row d-flex justify-content-center">
                                <h4  class="d-flex justify-content-center pb-5">Hallo, Admin!</h4>
                                <div class="about">
                                    <form action="#" method="post" class="mt-4" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="inputNama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="inputNama" name="title_content" value="<?= $_SESSION["nama_admin"] ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" name="title_content" value="<?= $_SESSION["login_email"] ?>"  disabled>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <input type="Password" class="form-control" id="inputPassword" name="title_content" value="123">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success d-flex me-3">Simpan</button>
                                            <button type="reset" class="btn btn-outline-success d-flex">Batal</button>
                                        </div> -->
                                        
                                      </form>
                                </div>
                            </div>
                                
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