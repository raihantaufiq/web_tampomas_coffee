<?php
// Start the session
session_start();
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
                  <a href="about.php" class="nav-item me-3 nav-active">Tentang Kami</a>
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
                  <a href="index.php" class="nav-item me-3">Beranda</a>
                  <a href="product.php" class="nav-item me-3">Belanja</a>
                  <a href="blog.php" class="nav-item me-3">Blog</a>
                  <a href="about.php" class="nav-item me-3 nav-active">Tentang Kami</a>
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
                <div class="g-0 row">
                    <div class="py-5 py-lg-0">
                      <h1 class="text-white fw-semi-bold text-start" style="font-family: 'Public Sans'; font-size: 72px; letter-spacing: -3px;">Tentang Kami</h1>
                      <p class="pt-2 text-start col-5"style="font-size: 20px;">Tampomas Coffee merupakan brand yang menyajikan serbuk kopi dengan cita rasa unik khas tanah pangadegan sumedang.</p>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Isi -->
        <div class="bg-white py-4">
          <div class="container py-2 mt-5">
            <div class="align-items-top g-0 row justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-12 ">
                  <div class="ms-3"> 
                    <h2 class="my-3 pb-5 secondary-2 full-typeface" style="font-size: 48px; font-weight: 600;">
                       Sejarah
                    </h2>
                  </div>
                </div>

                <div class="container py-5">
                    <div class="main-timeline">
                    <div class="timeline right">
                        <div class="mb-5">
                            <div class="text-start mb-5">
                                <h2>Tahun 1830-1870</h2>
                                <p class="mb-0">Indonesia dijajah oleh belanda dan menerapkan sistem tanam paksa. 
                                  Sistem ini terjadi di setiap desa di indonesia termasuk desa pangadegan dan 
                                  kebetulan pada saat itu desa pangadegan termasuk desa yang menanam kopi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline left">
                        <div class="my-5">
                            <div class="text-end my-5">
                                <h2>Tahun 1870</h2>
                                <p class="mb-0">Belanda memindahkan penanaman kopi ke desa lain dan desa pangadegan 
                                  ditinggalkan secara percuma. Peninggalan kopi pun semakin lama semakin tertimbun 
                                  oleh alam.</p>
                            </div>
                        </div>    
                    </div>
                    <div class="timeline right">
                        <div class="my-5">
                            <div class="text-start my-5">
                                <h2>Tahun 2007-2010</h2>
                                <p class="mb-0">Seseorang dari desa pangadegan berhasil menemukan kopi dihutan, 
                                  dan setelah melakukan penelitian dan penelusuran ternyata kopi tersebut merupakan 
                                  peninggalan belanda, tentunya kopi tersebut telah menyesuaikan dengan iklim dan 
                                  habitat di hutan indonesia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline left">
                        <div class="my-5">
                            <div class="text-end my-5">
                                <h2>Sekarang</h2>
                                <p class="mb-0">Kopi di desa pangadegan telah diekspan dan dilestarikan oleh 
                                  perhutani dan telah menjadi pendapatan terbesar warga pangadegan. </p>
                            </div>
                        </div> 
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="py-4 shadow-sm" style="background-color: rgba(231, 209, 177, 0.3);">
          <div class="container py-2 mb-2">
            <div class="align-items-top g-0 row justify-content-center">
              <div class="ms-3 text-start">
                <h2 class="my-3 pb-5 secondary-2 full-typeface" style="font-size: 48px; font-weight: 600;">
                    Tampomas Coffee
                </h2>
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <span class="iconify rounded-circle border border-dark p-3" data-icon="ep:coffee-cup" data-width="80" ></span>
                        <h5 class="mt-3">Memiliki cita rasa arabica yang khas.</h5>
                    </div>
                    <div class="col-sm-4 text-center">
                        <span class="iconify rounded-circle border border-dark p-3" data-icon="ep:coffee-cup" data-width="80" ></span>
                        <h5 class="mt-3">Produk lokal yang berkualitas. </h5>
                    </div>
                    <div class="col-sm-4 text-center">
                        <span class="iconify rounded-circle border border-dark p-3" data-icon="ep:coffee-cup" data-width="80" ></span>
                        <h5 class="mt-3">Pemrosesan secara alami.</h5>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white py-4">
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
                      <p class="secondary">Kopi dipetik dengan cara tradisional oleh petani yang telah berpengalaman 
                        bertahun-tahun. Setelah dipetik biji kopi diproses oleh warga sekitar, dengan 
                        berbagai macam proses, dan jadilah biji kopi yang khas dari daerah pangadegan. </p>
                      
                      
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="py-4 shadow-sm" style="background-color: rgba(231, 209, 177, 0.3);">
            <div class="container py-5">
                <div class="align-items-center g-0 row ">
                  <div class="col-xl-5 col-lg-6 col-md-12 ">
                    <div class="py-5 py-lg-0">
                        <p class="mb-0">Dikarenakan tanaman kopi yang telah ditinggalkan belanda selama puluhan tahun, 
                          tanaman kopi telah beradaptasi dengan lingkungan sekitar. Oleh sebab itu tanaman kopi tersebut 
                          menjadi unggul dan kebal dilingkungannya sendiri.</p>
                    </div>
                  </div>
                  <div class="text-lg-end text-center col-lg-7 col-lg-6 col-md-12">
                    <img src="assets/image/Rectangle 126.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
        </div>
        <div class="container my-5">
          <h1 class="secondary text-center">Toko Kami</h1>
          <div class="container d-flex justify-content-around p-5">
              <div><a href="#"><img src="assets/image/Tampomas-Light.png" alt="tampomas" width="200" height="auto"></a></div>
              <div><a href="#"><img src="assets/image/Rectangle 134.png" alt="tampomas" width="200" height="auto"></a></div>
              <div><a href="#"><img src="assets/image/Rectangle 135.png" alt="tampomas" width="200" height="auto"></a></div>
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