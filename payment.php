<?php
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: index.php');
}

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
                  <a href="index.php" class="nav-item me-3">Beranda</a>
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
        <?php } ?>
        <!-- Header-->
        <div class="bg-white">
            <div class="pt-5 text-center rounded text-white">
              <div class="container  mb-5">
                <div class="g-0 row">
                    <div class="py-lg-0">
                        <h1 class="secondary full-typeface text-center" style=" font-size: 48px; letter-spacing: -3px; font-weight: 500;">Pembayaran</h1>
                        <a href="product.php"><h class="pt-2 primary nav-active text-center col-5"style="font-size: 20px;">Lanjutkan Belanja</h></a>
                    </div>
                </div>
                </div>
            </div>
          </div>
          <!-- Isi -->
          <div class="container px-0 px-lg-3 mb-5">
            <nav>

              <ol class="breadcrumb" >
                <?php if(isset($_GET['produk']) && isset($_GET['jml'])){ ?>
                  <!-- dari buy now -->
                  <li class="breadcrumb-item "><a href="product.php" style="font-size: 18px; text-decoration: none; color:black">Produk</a></li>
                  <li class="breadcrumb-item "><a href="checkout.php?produk=<?php echo $id_produk . "&jml=". $jml?>" style="font-size: 18px; text-decoration: none; color:black">Pengiriman</a></li>
                <?php } else { ?>
                  <!-- dari cart -->
                  <li class="breadcrumb-item "><a href="cart.php" style="font-size: 18px; text-decoration: none; color:black">Keranjang</a></li>
                  <li class="breadcrumb-item "><a href="checkout.php" style="font-size: 18px; text-decoration: none; color:black">Pengiriman</a></li>
                <?php } ?>
                
                <li class="breadcrumb-item primary" style="font-size: 18px;">Pembayaran</li>
              </ol>
            </nav>

            <?php 
              // ambil data kostumer dari database berdasarkan session
              $email_login = $_SESSION["login_email"];
              $query = "SELECT * FROM m_customer WHERE email_customer='$email_login'";
              $result = mysqli_query($db_connect, $query);
              list($id_customer, $nama, $email, $password, $telepon) = mysqli_fetch_array($result);
              // ambil data alamat berdasarkan id kostumer
              $query = "SELECT * FROM m_address WHERE m_customer_id_m_customer='$id_customer'";
              $result = mysqli_query($db_connect, $query);
              list($id_address, $provinsi, $zipcode, $alamat, $kota, $kecamatan, $kelurahan, $id_costumer_inaddress) = mysqli_fetch_array($result);
            ?>
            <div class="row justify-content-between mt-5">
              <div class="col-5">
                <?php 
                if (isset($_GET['produk']) && isset($_GET['jml'])) {
                  // untuk pemesanan dari buy now
                  $id_produk = $_GET['produk'];
                  $jml = $_GET['jml'];
                  $action_form = "proses/add_to_pemesanan_p.php?produk=$id_produk&jml=$jml";
                }else {
                  // untuk pemesanan dari chart
                  $action_form = "proses/add_to_pemesanan_p.php";
                }
                ?>

                <form action="<?php echo $action_form; ?>" method="POST">
                  <div class="form-floating mb-2">
                    <input readonly name="Nama" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $_POST['Nama']?>" required>
                    <label for="floatingInput">Nama</label>
                  </div>
                  <div class="form-floating mb-2">
                    <input readonly name="Contact" type="Contact" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $_POST['Contact']?>" required>
                    <label for="floatingInput">Kontak</label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea readonly name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; resize: none;"><?php echo $_POST['alamat']?></textarea>
                    <label for="alamat">Kirim Ke</label>
                  </div>
      
    
                  <div class="mt-5">
                    <h2 class="full-typeface fw-bold">Pembayaran</h2>
                      <div class="accordion accordion-flush" id="accordionFlush">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" >
                                <label for="Manual-Transfer"> Manual Transfer</label><br>
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                            <div class="accordion-body text-center">
                                <p>Rek. Tampomas Coffe</p>
                                <p>Silahkan transfer seluruh total biaya ke rekening bank dibawah ini</p>
                                <p>BNI : 837517092048280 </p>
                                <p>A/N Anda</p>
                                <p>BCA : 722620492  </p>
                                <p>A/N Anda</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="d-grid gap-2 mt-5 d-md-flex justify-content-md-start">
                    <input class="btn btn-success btn-login px-4" name="submit" type="submit" value="Selesaikan Pesanan">  
                  </div>
                </form>
                
              </div>
              <div class="col-6">
              <div class="row g-0">
                 <!-- untuk pemesanan dari buy now -->
                <?php
                if (isset($_GET['produk']) && isset($_GET['jml'])) {
                  $id_produk = $_GET['produk'];
                  $jml = $_GET['jml'];
                  // ambil data produk dari database
                  $query = "SELECT id_m_product, category_product, photo_product, name_product, price_product FROM m_product WHERE id_m_product = '$id_produk'";
                  $result = mysqli_query($db_connect, $query);
                  list($id, $kategori, $foto, $nama, $harga) = mysqli_fetch_array($result);
                  $total = 0;
                ?>
                <!-- buy now -->
                <div class="row g-0 my-1">
                  <div class="col-md-3">
                    <img src="assets/image_product/<?php echo $foto?>" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="mt-sm-3 ms-3 pe-4">
                      <h5><b><?php echo $nama?></b></h5>
                      <div class="container">
                        <div class="row justify-content-start">
                          <div class="col-5">
                            <h6>Qty <?php echo $jml?></h6>
                          </div>
                          <div class="col-6" style="color:rgba(0, 0, 0, 0.4);">
                            <h6>Rp <?php echo number_format(($jml * $harga), 0, ',', '.'); ?></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr></hr>
                <?php 
                  $total = $total + ($jml * $harga);
                ?>
                <!-- end buy now -->
                <?php
                }else {
                  // untuk pemesanan dari chart
                  // cari id customer berdasarkan email
                  $email = $_SESSION["login_email"];
                  $query = "SELECT id_m_customer FROM m_customer WHERE email_customer='$email'";
                  $result = mysqli_query($db_connect, $query);
                  list($id_pelanggan) = mysqli_fetch_array($result);
                  // ambil data cart berdasarkan costumer
                  $query = "SELECT id_m_cart, total_product, m_product_id_m_product FROM m_cart WHERE m_customer_id_m_customer='$id_pelanggan'";
                  $result = mysqli_query($db_connect, $query);
                
                  $total = 0;
                  while(list($id_cart, $jml_produk, $id_produk) = mysqli_fetch_array($result)){
                  ?>
                  <!-- while -->
                    <?php
                    // ambil data produk berdasarkan id
                    $query1 = "SELECT photo_product, name_product, price_product FROM m_product WHERE id_m_product='$id_produk'";
                    $result1 = mysqli_query($db_connect, $query1);
                    list($foto_produk, $nama_produk, $harga_produk) = mysqli_fetch_array($result1);
                    ?>
                    <div class="row g-0 my-1">
                      <div class="col-md-3">
                        <img src="assets/image_product/<?php echo $foto_produk?>" class="img-fluid" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="mt-sm-3 ms-3 pe-4">
                          <h5><b><?php echo $nama_produk?></b></h5>
                          <div class="container">
                            <div class="row justify-content-start">
                              <div class="col-5">
                                <h6>Qty <?php echo $jml_produk?></h6>
                              </div>
                              <div class="col-6" style="color:rgba(0, 0, 0, 0.4);">
                                <h6>Rp <?php echo number_format(($jml_produk * $harga_produk), 0, ',', '.'); ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr/>
                    <?php
                    // hitung total
                    $total = $total + ($harga_produk * $jml_produk);
                    ?>
                  <!-- end while -->
                  <?php 
                  }
                }
                  ?>
                <div class="container">
                  <div class="row justify-content-start pt-5">
                    <div class="col-5">
                      <h5>Total</h5>
                      <p style="font-size: 12px;">*Harga Belum termasuk Ongkir</p>
                    </div>
                    <div class="col-6" style="color:#B99765;">
                      <h5 class="text-end">Rp <?php echo number_format($total, 0, ',', '.'); ?></h5>
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