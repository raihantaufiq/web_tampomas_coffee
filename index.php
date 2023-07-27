<?php
// Start the session
session_start();

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
                  <a href="index.php" class="nav-item me-3 nav-active">Beranda</a>
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
        <!-- navbar belum login -->
        <?php }else{ ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <div class="container-fluid">
              <a href="index.php" class="navbar-brand mx-3 my-2"><img src="assets/image/logo.png" alt="logo" style="width: 180px;"></a>

                <div class="nav mx-auto">
                  <a href="index.php" class="nav-item me-3 nav-active">Beranda</a>
                  <a href="product.php" class="nav-item me-3">Belanja</a>
                  <a href="blog.php" class="nav-item me-3">Blog</a>
                  <a href="about.php" class="nav-item me-3 ">Tentang Kami</a>
                </div>

                <div class="nav">
                  <a name="Login" id="Login" class="btn btn-outline-success me-3" href="login_form.php" >Login</a>
                  <a name="signin" id="signin" class="btn btn-success" href="signup_1.php" >Sign Up</a> 
                </div>
          </div>
        </nav>
        <?php } ?>
        
        <!-- Header-->
        <div class="bg-image"
              style="background-image: url('assets/image/pic2.png');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center center;
              "
            >
            <div class="p-5 text-center shadow-1-strong rounded text-white" style="background-color: rgba(118, 118, 118, 0.43);">
              <div class="container py-5 my-5">
                <div class="align-items-center g-0 row ">
                    <div class="py-5 py-lg-0">
                      <p style="font-size: 20px;">Nikmati rasa yang terbaik</p>
                      <h1 class="text-white fw-semi-bold" style="font-family: 'Public Sans'; font-size: 72px; letter-spacing: -3px;">Jelajahi Dunia Kopi dan Temukan Biji Favorit Anda</h1>
                        <a href="product.php"><button class="btn btn-success btn-login px-4 my-3" style="font-size: 18px;">Jelajahi Sekarang</button></a>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Isi -->
        <div class="py-4 shadow-sm " style="background-color: rgba(231, 209, 177, 0.3);">
          <div class="container py-2 mt-5">
            <div class="align-items-top g-0 row justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-12 ">
                  <div class="ms-3">
                    <h5 class="mb-0 fw-semi-bold primary" >Tampomas Coffee</h5>
                    <h2 class="my-3 pb-5 secondary full-typeface" style="font-size: 48px; font-weight: 600;">
                      Kami Tumbuh & Panen
                      Setiap Biji Kopi
                      dengan cinta
                    </h2>
                    
                    <div class="py-5 my-5">
                      <img src="assets/image/image 1.png" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="text-lg-start text-center col-xl-6 col-lg-6 col-md-12">
                  <div class="me-5">
                    <div class="pb-5 mb-5">
                      <img src="assets/image/pic1.png" alt="" class="img-fluid">
                    </div>
                    <p class="secondary">Biji kopi yang kami tanam berasal dari tanah pangadegan kabupaten sumedang. 
                      Memiliki cita rasa khas arabika yang tidak kalah unik. Biji kopi diproses alami dengan 
                      penanaman dan perawatan secara organik.  
                    </p>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="bg-white py-4 " >
          <div class="container py-2 mt-5">
            <div class="align-items-top g-0 row justify-content-center">
              <div class="ms-3 text-center">
                <h5 class="mb-0 fw-semi-bold primary" >PRODUK</h5>
                <h2 class="my-3 pb-5 secondary full-typeface" style="font-size: 48px; font-weight: 600;">
                  Rekomendasi Kami
                </h2>
                <div class="row">
                  <?php
                  // ambil data produk dari database
                  $query = "SELECT id_m_product, category_product, photo_product, name_product, price_product FROM m_product LIMIT 4";
                  $result = mysqli_query($db_connect, $query);
                  while(list($id, $kategori, $foto, $nama, $harga) = mysqli_fetch_array($result)){
                  ?>
                  <!-- while 4 putaran -->
                  <div class="col-md-3 col-sm-6">
                    <div class="card mb-2">
                      <img class="card-img-top" src="assets/image_product/<?php echo $foto; ?>"
                            alt="Card image cap">
                      <div class="card-body ">
                        <h5 class="card-title"><?php echo $nama; ?></h5>
                        <p class="card-text"><?php echo $kategori; ?></p>
                        <h6 class="mb-4" style="color: red;">Rp <?php echo number_format($harga, 0, ',', '.'); ?></h6>
                        <a href="product_single.php?produk=<?php echo $id; ?>" class="d-grid px-4" style="text-decoration: none;"><button class="btn btn-outline-success rounded-pill"> Selengkapnya</button></a>               
                      </div>
                    </div>
                  </div>
                  <!-- end while -->
                  <?php } ?>
                  <!-- <div class="col-md-3 col-sm-6 clearfix d-none d-md-block">
                    <div class="card mb-2">
                      <img class="card-img-top" src="assets/image/Zip Bag Mockup2 1.png"
                            alt="Card image cap">
                      <div class="card-body text-left">
                        <h5 class="card-title">Arabica Wash</h5>
                        <p class="card-text">wash, monocotyl</p>
                        
                        <h6 class="mb-4" style="color: red;">Rp. 50.000</h6>
                        <a href="product_single" class="d-grid px-4" style="text-decoration: none;"><button class="btn btn-outline-success rounded-pill"> Selengkapnya</button></a>
                      </div>
                    </div>
                  </div> -->
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="py-4 shadow-sm " style="background-color: rgba(231, 209, 177, 0.3);">
          <div class="container py-2 mt-5 mb-5">
            <div class="align-items-top g-0 row justify-content-center">
              <div class="ms-3 text-center">
                <!-- -->
                <?php
                // ambil data produk dari database
                $query = "SELECT id_m_product, photo_product, name_product, price_product, desc_product FROM m_product LIMIT 1";
                $result = mysqli_query($db_connect, $query);
                list($id, $foto, $nama, $harga, $desc) = mysqli_fetch_array($result);
                ?>
                <h5 class="mb-0 fw-semi-bold primary" >PRODUK</h5>
                <h2 class="my-3 pb-5 secondary full-typeface" style="font-size: 48px; font-weight: 600;">
                  Terlaris
                </h2>
                <div class="container py-5">
                  <div class="align-items-center g-0 row ">
                    <div class="col-xl-5 col-lg-6 col-md-12 ">
                      <div class="text-lg-start py-5 py-lg-0">
                        <h1 class="full-typeface fw-bold pb-4"><?php echo $nama; ?></h1>
                        <p class="mb-4 lead secondary pb-4"><?php echo $desc; ?></p>
                        <a href="product_single.php?produk=<?php echo $id; ?>"><button class="btn btn-success btn-login px-4 my-3" style="font-size: 18px;">Beli Sekarang</button></a>
                      </div>
                    </div>
                    <div class="text-lg-end text-center col-lg-7 col-lg-6 col-md-12">
                      <img src="assets/image_product/<?php echo $foto; ?>" style="max-width: 400px; height: 350px; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-image"
              style="background-image: url('assets/image/Rectangle\ 99.png');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center center;
              "
            >
            <div class="p-5 text-center shadow-1-strong rounded text-white" style="background-color: rgba(118, 118, 118, 0.43);">
              <div class="container py-5 my-5">
                <div class="align-items-center g-0 row ">
                    <div class="py-5 py-lg-0">
                      <p class="p-5 full-typeface"style="font-size: 30px;">"Saya percaya manusia menyelesaikan banyak hal, bukan karena kita pintar, tapi karena kita punya tangan sehingga kita bisa membuat kopi." </p>
                      <p class="pt-2 "style="font-size: 20px;">- Flash Rosenberg</p>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="bg-white py-4 " >
          <div class="container py-2 mt-5">
            <div class="row ">
              <div class="ms-3">
                <h5 class="mb-0 fw-semi-bold primary text-center" >KONTEN</h5>
                <h2 class="my-3 pb-5 secondary full-typeface text-center" style="font-size: 48px; font-weight: 600;">
                  Blog
                </h2>
                <div class="row">
                  <?php 
                  // ambil data konten dari database
                  $query = "SELECT idm_content, title_content, date_content, photo_content FROM m_content LIMIT 3";
                  $result = mysqli_query($db_connect, $query);
                  while(list($id, $judul, $tanggal, $foto) = mysqli_fetch_array($result)){
                  ?>
                  <!-- while 3 putaran -->
                  <div class="col-md-4 col-sm-6 text-lg-start py-2">
                    <a href="blog_single.php?konten=<?php echo $id; ?>" class="text-decoration-none text-black">
                      <div class="text-center">
                        <img class="img-fluid" src="assets/image_content/<?php echo $foto; ?>" style="max-height: 250px">
                      </div>
                      <div class="pt-2">
                        <!-- <p class="m-0" style="color: red;">Grain</p> -->
                        <h5><?php echo $judul; ?></h5>
                        <p class="m-0" style="color: rgba(0, 0, 0, 0.4);"><?php echo $tanggal; ?></p>
                      </div>
                    </a>
                  </div>
                  <?php } ?>
                  <!-- end while -->
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