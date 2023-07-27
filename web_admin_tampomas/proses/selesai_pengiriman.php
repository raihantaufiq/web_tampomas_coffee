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

// ubah status_pembelian pada tabel m_pembelian jadi 2
include("db_connect.php"); // buka database
$query = "UPDATE m_pembelian SET status_pembelian=2 WHERE id_bungkus=$no_order";
mysqli_query($db_connect, $query);
echo mysqli_error($db_connect);

header('location: ../pengiriman.php');

?>