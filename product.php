<?php
// Start the session
session_start();

// buka database
include("proses/db_connect.php");

// pengaturan sorting
if (isset($_POST['sort'])) {
  $ascdesc = $_POST['terurut'];
  $orderby = $_POST['urutkan'];
} else {
  $ascdesc = "ASC";
  $orderby = "name_product";
}

// pengaturan search
if (isset($_GET['cari']) && ($_GET['cari'] != "")) {
  $searching = "WHERE name_product LIKE '%" . $_GET['cari'] . "%' OR category_product LIKE '%" . $_GET['cari'] . "%' OR price_product LIKE '%" . $_GET['cari'] . "%'";
} else {
  $searching = "";
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
                  <a href="product.php" class="nav-item me-3 nav-active">Belanja</a>
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
                  <a href="index.php" class="nav-item me-3">Beranda</a>
                  <a href="product.php" class="nav-item me-3 nav-active">Belanja</a>
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
        <header>
            <div class="bg-image"
                  style="background-image: url('assets/image/img_product_list.png');
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center center;
                  "
                >
                <div class="p-5 text-center shadow-1-strong rounded text-white" style="background-color: rgba(118, 118, 118, 0.43);">
                  <div class="container py-5 my-5">
                    <div class="align-items-center g-0 row ">
                        <div class="py-5 py-lg-0">
                          <h1 class="text-white fw-semi-bold" style="font-family: 'Public Sans'; font-size: 72px; letter-spacing: -3px;">
                          Produk</h1>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </header>
      
          <!-- Isi -->
          <div class="my-5">
            <!-- filter produk -->
            <hr class="opacity-75">
            <form action="product.php<?php if(isset($_GET['cari'])){echo "?cari=". $_GET['cari'] ;} ?>" method="POST">
             <div class="container d-md-flex justify-content-around align-middle">
              <div class="col-md-3">
                <div class="row">
                  <label for="terurut" class="col-4 col-form-label">Terurut</label>
                  <div class="col-8">
                    <select id="terurut" class="form-select border-dark" name="terurut">
                      <option <?php if($ascdesc == "ASC" ){echo "selected";} ?> value="ASC">Ke atas</option>
                      <option <?php if($ascdesc == "DESC"){echo "selected";} ?> value="DESC">Ke bawah</option>
                    </select>
                  </div>
                </div>
              </div>
      
              <div class="col-md-3">
                <div class="row">
                  <label for="urutkan" class="col-4 col-form-label">Urutkan</label>
                  <div class="col-8">
                    <select id="urutkan" class="form-select border-dark" name="urutkan">
                        <option <?php if($orderby == "name_product"){echo "selected";} ?> value="name_product">Nama Produk</option>
                        <option <?php if($orderby == "category_product"){echo "selected";} ?> value="category_product">Kategori</option>
                        <option <?php if($orderby == "price_product"){echo "selected";} ?> value="price_product">Harga</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-1">
                <div class="row">
        
                  <div class="col-8 d-grid">
                    <input type="submit" name="sort" class="btn btn-outline-dark d-grid" value="Terapkan">
                  </div>
                </div>
              </div>
            </form>
              <?php
              // hitung jumlah produk di database
              $query = "SELECT count(*) FROM m_product $searching";
              $result = mysqli_query($db_connect, $query);
              list($jml_produk) = mysqli_fetch_array($result);

              // tampilkan jumlah produk
              echo '<div>'.$jml_produk.' Produk</div>';
              ?>
              </div>
            <hr class="opacity-75">
          </div>

          <div class="container d-flex justify-content-center">
            <form class="d-flex" action="product.php" method="GET">
              <div>
                <input type="text" class="form-control rounded-0" name="cari" placeholder="Cari Produk" value="<?php if (isset($_GET['cari'])) {echo $_GET['cari'];} ?>">
              </div>
              <div>
                <button type="submit" class="btn btn-outline-dark rounded-0">Cari</button>
              </div>
            </form>
            <a class="btn btn-outline-dark rounded-0" href="product.php">Reset</a>
          </div>

          <div class="py-5 bg-light">
            <div class="container">
              <div class="row row-cols-2 row-cols-lg-3 g-5">
                <?php
                // ambil data produk dari database
                $query = "SELECT id_m_product, category_product, photo_product, name_product, price_product FROM m_product $searching ORDER BY $orderby $ascdesc";
                $result = mysqli_query($db_connect, $query);
                while(list($id, $kategori, $foto, $nama, $harga) = mysqli_fetch_array($result)){
                ?>
                <!-- while -->
                <div class="col d-flex justify-content-center">
                  <!-- a href nya berdasarkan id -->
                  <a href="product_single.php?produk=<?php echo $id; ?>" class="card h-100 w-100 text-dark shadow rounded-3" style="text-decoration: none;">
                    <img src="assets/image_product/<?php echo $foto; ?>" width="auto" height="225" alt="foto" class="img-fluid">
                    <div class="card-body">
                      <div class="card-text px-2 primary"><?php echo $kategori; ?></div>
                      <h5 class="card-text px-2 fw-bold pt-2"><?php echo $nama; ?></h5>
                      <div class="card-text px-2 secondary">Rp <?php echo number_format($harga, 0, ',', '.'); ?></div>
                    </div>
                  </a>
                </div>
                <?php } ?>
                <!-- end while -->
      
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