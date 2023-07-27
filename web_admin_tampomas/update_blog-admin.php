<?php

include 'proses/conf.php';
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
}

if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM m_content WHERE idm_content = '$id'");
    $result = mysqli_fetch_assoc($result);
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
                        <a href="Produk.php" class="nav_link active">
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
                <h3 class="text-center pb-3 ">Blog</h3>
                <div class="card p-2">
                    <div class="card-body py-4">
                        <a href="blog-admin.php"> < Kembali</a>
                      <form action="proses/update_blog.php" method="post" class="mt-4" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" id="inputJudul" name="idm_content" placeholder="Masukkan judul konten" value="<?= $result['idm_content'] ?>">
                      <input type="hidden" class="form-control" id="inputJudul" name="m_admin_id_m_admin" placeholder="Masukkan judul konten" value="<?= $result['m_admin_id_m_admin'] ?>">
                        <div class="mb-3">
                            <label for="inputJudul" class="form-label">Judul Konten</label>
                            <input type="text" class="form-control" id="inputJudul" name="title_content" placeholder="Masukkan judul konten" value="<?= $result['title_content'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="inputFoto" class="form-label">Foto</label>
                            <img src="<?= "../assets/image_content/" . $result['photo_content'] ?>" class=" img-fluid" alt="...">
                            <input type="hidden" class="form-control" id="inputFoto" name="image2" value="<?= $result['photo_content'] ?>">
                            <input type="file" class="form-control" id="inputFoto" name="image" >
                        </div>
                        <div class="mb-3">
                            <label for="inputDeskripsi" class="form-label">Isi Konten</label>
                            <textarea class="form-control" placeholder="Masukkan isi konten" id="inputDeskripsi" name="desc_content" style="height: 250px; resize: none;"><?= $result['desc_content'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputTanggal" class="form-label">Tanggal Terbit</label>
                            <input type="date" class="form-control" id="inputTanggal" name="date_content" placeholder="DD/MM/YY" value="<?= $result['date_content'] ?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success d-flex me-3" name="update_blog">Simpan</button>
                            <button type="reset" class="btn btn-outline-success d-flex">Batal</button>
                        </div>
                        
                      </form>
                    </div>
                  </div>
            </div>
            <!--Container Main end-->
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <script type=' text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
                                </script>
                                <script type='text/javascript' src='admin.js'></script>

    </body>

</html>