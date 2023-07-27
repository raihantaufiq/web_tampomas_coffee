<?php
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
}

// cek get
if (isset($_GET['no_order'])) {
    $no_order  = $_GET['no_order'];
} else {
    header('location: ../dashboard.php');
}

// ambil data dari tabel pemesanan berdasarkan id_bungkus
include("db_connect.php"); // buka database
$query = "SELECT * FROM m_pemesanan WHERE id_bungkus='$no_order'";
$result = mysqli_query($db_connect, $query);

while($row = mysqli_fetch_assoc($result)){

    date_default_timezone_set("Asia/Bangkok");
    $now = date("Y-m-d H:i:s");

    // masukkan data ke tabel fraud
    $id_produk = $row['id_product'];
    $total_produk = $row['total_product'];
    $tanggal_fraud = $now;
    $id_bungkus = $row['id_bungkus'];
    $query = "INSERT INTO m_fraud VALUES ('', '$id_produk', '$total_produk', '$tanggal_fraud', '$id_bungkus')";
    mysqli_query($db_connect, $query);
    echo mysqli_error($db_connect);

    $query = "DELETE FROM m_pembelian WHERE id_bungkus=$id_bungkus";
    mysqli_query($db_connect, $query);
    echo mysqli_error($db_connect);
}
// ubah status_pemesanan jadi -1
$query = "UPDATE m_pemesanan SET status_pemesanan=-1 WHERE id_bungkus=$no_order";
mysqli_query($db_connect, $query);
echo mysqli_error($db_connect);



// tutup database
mysqli_close($db_connect);

header('location: ../fraud.php');
?>