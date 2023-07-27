<?php

if (isset($_POST['submit_signup_1'])) {
  $uname_customer = $_POST['uname_customer'];
  $email_customer = $_POST['email_customer'];
  $phone_customer = $_POST['phone_customer'];
  $pass_customer = $_POST['pass_customer'];
}else{
  header('location: signup_1.php');
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <style>
          /* menghilangkan tombol spin pada input number */
          input::-webkit-outer-spin-button,
          input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
          }
        </style>
      </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand mx-3 my-2"><img src="assets/image/logo.png" alt="logo" style="width: 180px;"></a>

                <div class="nav mx-auto">
                  <a href="index.php" class="nav-item me-3">Beranda</a>
                  <a href="product.php" class="nav-item me-3">Belanja</a>
                  <a href="blog.php" class="nav-item me-3">Blog</a>
                  <a href="about.php" class="nav-item me-3">Tentang Kami</a>
                </div>

                <!-- invisibled -->
                <div class="nav invisible">
                  <div class="link account">
                    <a href="profile.php"><span class="iconify me-3" data-icon="clarity:avatar-line" data-width="30" data-height="30" style="color: #1b2223;"></span></a>
                  </div>
                  <div class="link chart">
                    <a href="cart.php"><span class="iconify" data-icon="la:shopping-bag" data-width="30" data-height="30" style="color: #1b2223;"></span></a>
                  </div>
                </div>
                  
            </div>
        </nav>
        <!-- Header-->

        <section class="p-5">


            <div class="container">
              <div class="p-5 m-auto" style="width: 536px;
                    height: 733px; background: #54401E;">
                <div class="bg-white m-auto" style="width: 398px;
                  height: 628px;">
                  <form class="" method="POST" action="proses/signup_p.php">
                    <div class="" style="background: #D19F4B; height: 57px;">
                      <h5 class="form-title">
                        <div class="row text-center p-3 text-white m-auto">
                          <div class="col fs-5"><a class="login fs-5" href="login_form.php" 
                              style="text-decoration: none;color: white;">Masuk</a></div> <!-- sesuaikan href nya -->
                          <div class="col fs-5">
                            <a class="signup fs-5" href="#" style="text-decoration: none;color: white;">Daftar</a>
                            <h2>^</h2>
                          </div>
                        </div>
                      </h5>
                    </div>

                    <div>
                      <!-- isi dari form signup 1 -->
                      <?php
                      echo '<input type="hidden" id="uname_customer" name="uname_customer" value="'.$uname_customer.'">';
                      echo '<input type="hidden" id="email_customer" name="email_customer" value="'.$email_customer.'">';
                      echo '<input type="hidden" id="phone_customer" name="phone_customer" value="'.$phone_customer.'">';
                      echo '<input type="hidden" id="pass_customer" name="pass_customer" value="'.$pass_customer.'">';
                      ?>
                    </div>
                    <div class=" ps-4 mt-2">
                      <a href="signup_1.php" style="text-decoration: none;"> < Kembali</a>
                    </div>
                    <div class=" mb-4 ps-5 pe-5 mt-5">
                      <input required type="text" name="m_address" class="w3-input" id="m_address" placeholder="Alamat">
                    </div>
      
                    <div class="mb-4 ps-5 pe-5">
                      <input required type="text" name="m_kelurahan" class="w3-input" id="m_kelurahan" placeholder="Keluarahan">
                    </div>
                    <div class="mb-4 ps-5 pe-5">
                      <input required type="text" name="m_kecamatan" class="w3-input" id="m_kecamatan" placeholder="Kecamatan">
                    </div>
                    <div class="mb-4 ps-5 pe-5">
                      <input required type="text" name="m_kota" class="w3-input" id="m_kota" placeholder="Kota">
                    </div>
                    <div class="mb-4 ps-5 pe-5">
                      <select required class="form-select border-0 border-bottom" name="m_provinsi" class="w3-input" id="m_provinsi">
                        <option selected disabled value="">Provinsi</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                      </select>
                    </div>
                    <div class="mb-4 ps-5 pe-5">
                      <input required type="number" name="m_zipcode" class="w3-input" id="m_zipcode" placeholder="Kode Pos">
                    </div>
                    <div class="mb-4 ps-5 pe-5 text-muted">
                      <input required class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault" style="font-size: 12px;">
                        I agree with term and condition
                      </label>
                    </div>
                    <div required class="mt-5 mb-4 ps-5 pe-5 pb-3 text-center">
                      <input type="submit" value="Daftar" name="submit_signup_2" id="submit_signup_2" class="btn btn-white border-dark rounded-pill w-50">
                    </div>
                  </form>
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
</html>