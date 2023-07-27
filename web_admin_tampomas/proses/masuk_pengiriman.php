<?php
// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email_admin"])) {
    header('location: ../login_form.php');
}

// cek get
if (isset($_POST['submit'])) {
    $no_order  = $_POST['no_order'];
    
} else {
    header('location: ../dashboard.php');
}

// ambil data dari tabel pemesanan berdasarkan id_bungkus
include("db_connect.php"); // buka database
$query = "SELECT * FROM m_pemesanan WHERE id_bungkus='$no_order'";
$result = mysqli_query($db_connect, $query);

while($row = mysqli_fetch_assoc($result)){

    // masukkan data ke tabel shipping
    $tanggal_shipping = $_POST['tanggal_pengiriman'];
    $resi = $_POST['resi'];
    $id_bungkus = $row['id_bungkus'];
    $query = "INSERT INTO m_shipping VALUES ('', '$resi', '$tanggal_shipping', '$id_bungkus')";
    mysqli_query($db_connect, $query);
    echo mysqli_error($db_connect);
}

// ubah status_pembelian pada tabel m_pembelian jadi 1
$query = "UPDATE m_pembelian SET status_pembelian=1 WHERE id_bungkus=$no_order";
mysqli_query($db_connect, $query);
echo mysqli_error($db_connect);

// ubah status_pemesanan pada tabel m_pemesanan jadi 2
$query = "UPDATE m_pemesanan SET status_pemesanan=2 WHERE id_bungkus=$no_order";
mysqli_query($db_connect, $query);
echo mysqli_error($db_connect);

// tutup database
mysqli_close($db_connect);

header('location: ../pengiriman.php');
?>