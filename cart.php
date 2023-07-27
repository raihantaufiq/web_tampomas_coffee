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

        <!-- isi -->
        <div class="container text-center py-3 my-5">
            <h1 class="secondary">Keranjang</h1>
            <a href="product.php" class="primary">Continue Shopping</a>
        </div>
        <div class="container px-0 px-lg-3 mb-5">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-danger bg-opacity-10">
                      <th scope="col" class="col-1 px-lg-4 py-5">Produk</th>
                      <th scope="col" class="col-5"></th>
                      <th scope="col" class="col-2 text-center px-lg-4 py-5">Harga</th>
                      <th scope="col" class="col-1 text-center px-lg-4 py-5">Jumlah</th>
                      <th scope="col" class="col-2 text-center px-lg-4 py-5">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
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
                    <tr class="align-middle">
                      <td class="px-lg-3 py-4"><img src="assets/image_product/<?php echo $foto_produk; ?>" alt="produk" class="img-fluid img-thumbnail"></td>
                      <td class="px-lg-3 py-4">
                          <div class="container">
                              <h3 class="fw-bold"><?php echo $nama_produk; ?></h3>
                              <a href="proses/remove_cart_p.php?id_cart=<?php echo $id_cart; ?>" class="text-decoration-none primary">Remove</a>
                          </div>
                      </td>
                      <td class="text-center px-lg-3 py-4">Rp <?php echo number_format($harga_produk, 0, ',', '.'); ?></td>
                      <td class="text-center px-lg-3 py-4">
                          <input readonly type="number" name="quantity" id="quantity" min="1" class="form-control rounded-0" value="<?php echo $jml_produk; ?>">
                      </td>
                      <td class="text-center px-lg-3 py-4">Rp <?php echo number_format(($harga_produk * $jml_produk) , 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                    // hitung total
                    $total = $total + ($harga_produk * $jml_produk);
                    ?>
                  <!-- end while -->
                  <?php } ?>
                  </tbody>
            </table>
    
            <div class="container d-lg-flex justify-content-end ms-lg-2 my-4">

                <p class="fw-bold col-lg-1 text-center">Total Harga</p>
                <p class="text-warning text-center col-lg-2 primary">Rp <?php echo number_format(($total) , 0, ',', '.'); ?></p>
            </div>
            <div class="container d-flex justify-content-center justify-content-lg-end my-4">
                <a href="checkout.php" class="btn btn-success me-lg-5">Checkout</a>
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