    <?php



// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
}

include 'proses/conf.php';

$content = mysqli_query($conn, "SELECT COUNT(idm_content) as content FROM m_content");
$content = mysqli_fetch_assoc($content);


$product = mysqli_query($conn, "SELECT COUNT(id_m_product) as product FROM m_product");
$product = mysqli_fetch_assoc($product);

$pemesanan = mysqli_query($conn, "SELECT COUNT(id_m_pemesanan) as pemesanan FROM m_pemesanan");
$pemesanan = mysqli_fetch_assoc($pemesanan);

$fraud = mysqli_query($conn, "SELECT COUNT(id_m_fraud) as fraud FROM m_fraud GROUP BY id_bungkus");
$fraud = mysqli_fetch_assoc($fraud);


// buka database (buat koneksi ke database)
// include("../proses/db_connect.php");
?>

<!doctype hmtl>
<hmtl>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tampomas - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.admin.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</head>

<body classname='snippet-body' class="body-pd">

    <body id="body-pd">
        <header class="header body-pd" id="header">
            <div class="header_toggle ">
                <i class='bx bx-x bx-menu' id="header-toggle"></i>
            </div>
            <div class="row align-items-center" style="color:#204D48;">
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
                        <a href="dashboard.php" class="nav_link active">
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
            <div class="p-3">
                <h3 class="text-center pb-3">Dashboard</h3>
                <div class="row mb-3">
                    <div class="col-3 ">
                        <div class="card must-hover">
                            <div class="card-body text-center  should-hover" style="color: #E7D1B1;">
                                Content
                                <div class="pt-2 text-center card-number" style=" color: #204D48;">
                                    <h1><?= $content['content'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 ">
                        <div class="card must-hover">
                            <div class="card-body text-center  should-hover" style="color: #E7D1B1;">
                                Product
                                <div class="pt-2 text-center card-number" style=" color: #204D48;">
                                    <h1 ><?= $product['product'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 ">
                        <div class="card must-hover">
                            <div class="card-body text-center should-hover" style="color: #E7D1B1;">
                                Pemesanan
                                <div class="pt-2 text-center card-number" style=" color: #204D48;"> 
                                    <h1><?= $pemesanan["pemesanan"] ?></h1>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-3 ">
                        <div class="card must-hover">
                            <div class="card-body text-center  should-hover" style="color: #E7D1B1;">
                                Fraud
                                <div class="pt-2 text-center card-number" style=" color: #204D48;">
                                    <h1><?= $fraud['fraud'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>

            </div>
            <!--Container Main end-->
            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <script type=' text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='admin.js'></script>

    </body>

</html>