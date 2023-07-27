<?php
// Start the session
session_start();

// buka database
include("proses/db_connect.php");

// cek get
if (isset($_GET['konten'])) {
    $id_konten = $_GET['konten'];
    
}else{
    header('location: blog.php');
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
        <section>
            <img class="img-fluid w-100" src="assets/image/hero.png" alt="">
        </section>
        <!-- isi -->
        <?php 
        // ambil data konten dari database berdasarkan id
        $query = "SELECT title_content, desc_content, date_content, photo_content, m_admin_id_m_admin FROM m_content WHERE idm_content='$id_konten'";
        $result = mysqli_query($db_connect, $query);
        list($judul, $desc, $tanggal, $foto, $id_admin_inkonten) = mysqli_fetch_array($result);

        // ambil data admin dari database berdasarkan konten
        $query = "SELECT nama_admin FROM m_admin WHERE id_m_admin ='$id_admin_inkonten'";
        $result = mysqli_query($db_connect, $query);
        list($nama_admin) = mysqli_fetch_array($result);
        ?>
        <div class="container" style="background: #F8F1E8; margin-top:-280px; position: relative;">
            <div class="row text-center justify-content-center pt-5 mb-4">
                <div class="col-8">
                    <h1 class="" style="font-size:50px"><?php echo $judul; ?></h1>
                </div>
            </div>
            <div class="row text-center justify-content-center text-muted mb-5">
                <div class="d-flex justify-content-center mb-3 mt-3">
                    <span>
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.809 34.714C21.654 33.714 26.367 33.8 33.221 34.749C33.7174 34.821 34.1709 35.0701 34.4979 35.4504C34.8249 35.8307 35.0033 36.3165 35 36.818C35 37.298 34.835 37.764 34.537 38.128C34.0176 38.7626 33.4855 39.3868 32.941 40H35.582C35.748 39.802 35.915 39.6 36.084 39.395C36.6772 38.6676 37.0007 37.7576 37 36.819C37 34.794 35.522 33.049 33.495 32.769C26.479 31.798 21.575 31.705 14.52 32.736C12.472 33.035 11 34.807 11 36.846C11 37.751 11.295 38.646 11.854 39.371C12.019 39.585 12.182 39.795 12.344 40.001H14.921C14.4144 39.3945 13.9203 38.7777 13.439 38.151C13.153 37.7758 12.9987 37.3168 13 36.845C13 35.768 13.774 34.865 14.809 34.714ZM24 25C24.7879 25 25.5681 24.8448 26.2961 24.5433C27.0241 24.2417 27.6855 23.7998 28.2426 23.2426C28.7998 22.6855 29.2417 22.0241 29.5433 21.2961C29.8448 20.5681 30 19.7879 30 19C30 18.2121 29.8448 17.4319 29.5433 16.7039C29.2417 15.9759 28.7998 15.3145 28.2426 14.7574C27.6855 14.2002 27.0241 13.7583 26.2961 13.4567C25.5681 13.1552 24.7879 13 24 13C22.4087 13 20.8826 13.6321 19.7574 14.7574C18.6321 15.8826 18 17.4087 18 19C18 20.5913 18.6321 22.1174 19.7574 23.2426C20.8826 24.3679 22.4087 25 24 25ZM24 27C26.1217 27 28.1566 26.1571 29.6569 24.6569C31.1571 23.1566 32 21.1217 32 19C32 16.8783 31.1571 14.8434 29.6569 13.3431C28.1566 11.8429 26.1217 11 24 11C21.8783 11 19.8434 11.8429 18.3431 13.3431C16.8429 14.8434 16 16.8783 16 19C16 21.1217 16.8429 23.1566 18.3431 24.6569C19.8434 26.1571 21.8783 27 24 27Z"
                                fill="black" fill-opacity="0.6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24 42C33.941 42 42 33.941 42 24C42 14.059 33.941 6 24 6C14.059 6 6 14.059 6 24C6 33.941 14.059 42 24 42ZM24 44C35.046 44 44 35.046 44 24C44 12.954 35.046 4 24 4C12.954 4 4 12.954 4 24C4 35.046 12.954 44 24 44Z"
                                fill="black" fill-opacity="0.6" />
                        </svg>
                    </span>
                    <p class="mt-auto ms-3 me-4 fs-5"><?php echo $nama_admin; ?></p>
                    <ul class="d-flex mt-auto fs-5">
                        <li class="me-5 fs-5"><?php echo $tanggal; ?></li>
                        <!-- <li class="fs-5">0 Comments</li> -->
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="row justify-content-center d-flex text-center pb-5">
                    <div class="col"><img src="assets/image_content/<?php echo $foto; ?>" alt="" class="img-fluid" style="max-height: 400px; max-width: 700px"></div>
                    <!-- <div class="col"><img src="assets/image/arabica2.png" alt=""></div> -->
                </div>
                <div class="col-10 mb-4">
                    <p class="fs-4"><?php echo $desc; ?></p>
                </div>
            </div>
            
            <hr class="text-black">
            <div class="row justify-content-center ps-5 pe-5">
                <div class="col-10 d-flex ps-5">
                    <!-- <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M54.082 16.6172C53.2966 14.7987 52.1642 13.1508 50.748 11.7657C49.3308 10.3764 47.6599 9.27245 45.8262 8.51371C43.9247 7.72383 41.8852 7.31952 39.8262 7.32426C36.9375 7.32426 34.1191 8.11528 31.6699 9.60942C31.084 9.96684 30.5273 10.3594 30 10.7872C29.4727 10.3594 28.916 9.96684 28.3301 9.60942C25.8809 8.11528 23.0625 7.32426 20.1738 7.32426C18.0937 7.32426 16.0781 7.7227 14.1738 8.51371C12.334 9.27543 10.6758 10.3711 9.25195 11.7657C7.83396 13.1492 6.70124 14.7975 5.91797 16.6172C5.10352 18.5098 4.6875 20.5196 4.6875 22.5879C4.6875 24.5391 5.08594 26.5723 5.87695 28.6407C6.53906 30.3692 7.48828 32.1621 8.70117 33.9727C10.623 36.8379 13.2656 39.8262 16.5469 42.8555C21.9844 47.877 27.3691 51.3457 27.5977 51.4864L28.9863 52.377C29.6016 52.7696 30.3926 52.7696 31.0078 52.377L32.3965 51.4864C32.625 51.3399 38.0039 47.877 43.4473 42.8555C46.7285 39.8262 49.3711 36.8379 51.293 33.9727C52.5059 32.1621 53.4609 30.3692 54.1172 28.6407C54.9082 26.5723 55.3066 24.5391 55.3066 22.5879C55.3125 20.5196 54.8965 18.5098 54.082 16.6172ZM30 47.7422C30 47.7422 9.14062 34.377 9.14062 22.5879C9.14062 16.6172 14.0801 11.7774 20.1738 11.7774C24.457 11.7774 28.1719 14.168 30 17.6602C31.8281 14.168 35.543 11.7774 39.8262 11.7774C45.9199 11.7774 50.8594 16.6172 50.8594 22.5879C50.8594 34.377 30 47.7422 30 47.7422Z"
                            fill="#1B2223" />
                    </svg> -->
                </div>
                <div class="col p-auto">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M32.0328 7.94284C30.467 6.36966 28.6023 5.12243 26.5475 4.27384C24.4926 3.42524 22.2887 2.99226 20.064 3.0001C10.7422 3.0001 3.14515 10.5608 3.13661 19.8428C3.13661 22.8157 3.91788 25.7078 5.39289 28.2684L3 37L11.9739 34.6583C14.4564 36.0032 17.2377 36.7082 20.064 36.7089H20.0726C29.3965 36.7089 36.9915 29.1481 37 19.8577C37.0021 17.6435 36.5641 15.4508 35.7113 13.4059C34.8584 11.361 33.6075 9.50435 32.0306 7.94284H32.0328ZM20.064 33.8571C17.5431 33.858 15.0684 33.1826 12.9003 31.9021L12.388 31.5961L7.06429 32.9859L8.48594 27.8158L8.15294 27.2824C6.74369 25.0519 5.99837 22.4694 6.00339 19.8343C6.00339 12.1291 12.3154 5.84335 20.0726 5.84335C21.9206 5.84005 23.751 6.20093 25.4582 6.90519C27.1655 7.60945 28.7158 8.64315 30.0198 9.94671C31.3284 11.2452 32.3658 12.7887 33.0722 14.4883C33.7785 16.1879 34.1399 18.0099 34.1354 19.8492C34.1268 27.582 27.8148 33.8571 20.064 33.8571ZM27.7806 23.3724C27.3601 23.162 25.2831 22.1442 24.8925 21.9997C24.504 21.8615 24.2201 21.7893 23.9426 22.21C23.6587 22.6287 22.8476 23.5828 22.6042 23.8569C22.3609 24.1395 22.109 24.1714 21.6863 23.9632C21.2658 23.7507 19.9018 23.3087 18.288 21.87C17.0286 20.7544 16.1855 19.3732 15.9336 18.9546C15.6902 18.5338 15.9101 18.3086 16.1214 18.0982C16.3071 17.9112 16.5419 17.6052 16.7533 17.3629C16.9667 17.1207 17.0372 16.9422 17.1759 16.6617C17.3147 16.3769 17.2485 16.1347 17.1439 15.9243C17.0372 15.7139 16.194 13.6378 15.8375 12.8006C15.496 11.974 15.148 12.0887 14.8876 12.0781C14.6443 12.0632 14.3604 12.0632 14.0765 12.0632C13.8621 12.0685 13.6511 12.1179 13.4568 12.2082C13.2625 12.2985 13.089 12.4278 12.9473 12.5881C12.5588 13.0088 11.4722 14.0267 11.4722 16.1028C11.4722 18.1789 12.9878 20.1743 13.2013 20.4569C13.4105 20.7395 16.1769 24.9874 20.4226 26.8149C21.4259 27.2505 22.2157 27.5077 22.8326 27.7032C23.8466 28.0262 24.7623 27.9773 25.4923 27.8732C26.3035 27.7499 27.992 26.8532 28.3484 25.8693C28.6985 24.8833 28.6985 24.0418 28.5918 23.8654C28.4872 23.6869 28.2033 23.5828 27.7806 23.3724Z"
                            fill="#1B2223" />
                    </svg>
                </div>
                <div class="col pe-5">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.0002 11.9882C15.5666 11.9882 11.9885 15.5663 11.9885 19.9999C11.9885 24.4335 15.5666 28.0117 20.0002 28.0117C24.4338 28.0117 28.0119 24.4335 28.0119 19.9999C28.0119 15.5663 24.4338 11.9882 20.0002 11.9882ZM20.0002 25.207C17.133 25.207 14.7932 22.8671 14.7932 19.9999C14.7932 17.1328 17.133 14.7929 20.0002 14.7929C22.8674 14.7929 25.2072 17.1328 25.2072 19.9999C25.2072 22.8671 22.8674 25.207 20.0002 25.207ZM28.34 9.79291C27.3049 9.79291 26.4689 10.6288 26.4689 11.664C26.4689 12.6992 27.3049 13.5351 28.34 13.5351C29.3752 13.5351 30.2111 12.7031 30.2111 11.664C30.2114 11.4182 30.1632 11.1748 30.0693 10.9476C29.9754 10.7205 29.8376 10.5141 29.6638 10.3403C29.49 10.1664 29.2836 10.0286 29.0564 9.93471C28.8293 9.84079 28.5858 9.7926 28.34 9.79291ZM35.6174 19.9999C35.6174 17.8437 35.6369 15.707 35.5158 13.5546C35.3947 11.0546 34.8244 8.83588 32.9963 7.00775C31.1642 5.17572 28.9494 4.60932 26.4494 4.48822C24.2932 4.36713 22.1564 4.38666 20.0041 4.38666C17.8478 4.38666 15.7111 4.36713 13.5588 4.48822C11.0588 4.60932 8.84003 5.17963 7.0119 7.00775C5.17987 8.83978 4.61347 11.0546 4.49237 13.5546C4.37128 15.7109 4.39081 17.8476 4.39081 19.9999C4.39081 22.1523 4.37128 24.2929 4.49237 26.4453C4.61347 28.9453 5.18378 31.164 7.0119 32.9921C8.84394 34.8242 11.0588 35.3906 13.5588 35.5117C15.715 35.6328 17.8517 35.6132 20.0041 35.6132C22.1603 35.6132 24.2971 35.6328 26.4494 35.5117C28.9494 35.3906 31.1682 34.8203 32.9963 32.9921C34.8283 31.1601 35.3947 28.9453 35.5158 26.4453C35.6408 24.2929 35.6174 22.1562 35.6174 19.9999ZM32.1799 29.2109C31.8947 29.9218 31.551 30.4531 31.0002 30.9999C30.4494 31.5507 29.9221 31.8945 29.2111 32.1796C27.1564 32.996 22.2775 32.8124 20.0002 32.8124C17.7228 32.8124 12.84 32.996 10.7853 32.1835C10.0744 31.8984 9.54315 31.5546 8.99628 31.0038C8.4455 30.4531 8.10175 29.9257 7.81659 29.2148C7.00409 27.1562 7.18769 22.2773 7.18769 19.9999C7.18769 17.7226 7.00409 12.8398 7.81659 10.7851C8.10175 10.0742 8.4455 9.54291 8.99628 8.99604C9.54706 8.44916 10.0744 8.1015 10.7853 7.81635C12.84 7.00385 17.7228 7.18744 20.0002 7.18744C22.2775 7.18744 27.1603 7.00385 29.215 7.81635C29.926 8.1015 30.4572 8.44525 31.0041 8.99604C31.5549 9.54682 31.8986 10.0742 32.1838 10.7851C32.9963 12.8398 32.8127 17.7226 32.8127 19.9999C32.8127 22.2773 32.9963 27.1562 32.1799 29.2109Z"
                            fill="#1B2223" />
                    </svg>
                </div>
            </div>
            <hr class="Text-black">
            
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