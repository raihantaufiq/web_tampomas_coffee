<?php
// Start the session
session_start();

// buka database
include("proses/db_connect.php");

//fungsi untuk membatasi jumlah text yg ditampilkan
function limit_text($text, $limit) {
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos   = array_keys($words);
      $text  = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
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
        <link rel="stylesheet" href="css/blog-style.css">
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
                  <a href="blog.php" class="nav-item me-3 nav-active">Blog</a>
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
                  <a href="index.php" class="nav-item me-3">Beranda</a>
                  <a href="product.php" class="nav-item me-3">Belanja</a>
                  <a href="blog.php" class="nav-item me-3 nav-active">Blog</a>
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
        <!-- Main -->
        <section>
            <div class="masthead" style="background-image: url('./assets/image/blog-bg.png');">
                <div class="color-overlay d-flex justify-content-center align-items-center textBloghead">
                    <h1>
                        Blog
                    </h1>
                </div>
            </div>
        </section>
        <section>
          <div class="container justify-content-center">
            <div class="row my-3">

              <div class="col-lg-7">
                <?php 
                // ambil data konten dari database
                $query = "SELECT idm_content, title_content, desc_content, date_content, photo_content FROM m_content";
                $result = mysqli_query($db_connect, $query);
                while(list($id, $judul, $desc_pendek, $tanggal, $foto) = mysqli_fetch_array($result)){
                ?>
                <!-- while -->
                <div class="mb-3" style="background-color: #FBF9F4;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/image_content/<?php echo $foto; ?>" class="my-4 img-fluid" alt="fotokonten" width="200" height="200">
                      </div>
                      <div class="col-md-8">
                        <!-- a href nya berdasarkan id -->
                        <a href="blog_single.php?konten=<?php echo $id; ?>" style="text-decoration: none; color: #000;">
                        <div class="mt-sm-3 ms-3 pe-4">
                          <!-- <h5 class="btn btn-danger rounded-pill" style="color:white;">Grains</h5> -->
                          <h5><?php echo $judul; ?></h5>
                          <p class="" style="font-size:11px;"><?php echo limit_text($desc_pendek, 40); ?></p>
                          <div class="divider"></div>
                          <p class=""><small class="text-muted"><?php echo $tanggal; ?></small></p>
                        </div>
                        </a>
                      </div>
                    </div>
                </div>
                <?php } ?>
                <!-- end while -->
              </div>

              <div class="col" style="background-color: #FBF9F4;">
                  <div class="ms-5 mt-5 my-3">
                    <h4>Popular Post</h4>
                    <!-- manual dulu -->
                    <!-- while  -->
                    <!-- <div>
                      <div class="row g-0">
                        <div class="col-md-3">
                          <img src="./assets/image/blog-popular.png" class="my-4 img-fluid" alt="">
                        </div>
                        <div class="col-md-8">
                          <div class="mt-sm-3 ms-3 pe-4">
                            
                            <h5><a href="blog_single.php" style="text-decoration: none; color: #000;"><b>Bagaimana Coffee Tampomas dibuat</b></a></h5>
                            <div class="container">
                              <div class="row justify-content-start">
                                <div class="col-6" style="color:rgba(0, 0, 0, 0.4);">
                                  <h6>Kamis, Mei 05 2022</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <!-- end while -->
                  </div>  
              </div>
            </div>
          </div> 
        </section>
        
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