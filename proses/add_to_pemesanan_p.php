<?php
// Start the session
session_start();

// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: ../login_form.php');
}

// cek form
if (isset($_POST['submit'])) {
    $nama  = $_POST['Nama'];
    $kontak = $_POST['Contact'];
    $alamat = $_POST['alamat'];
} else {
    header('location: ../product.php');
}

// buka database
include("db_connect.php");

// buat bungkus
// cari id customer berdasarkan session email
$email = $_SESSION["login_email"];
$query = "SELECT id_m_customer FROM m_customer WHERE email_customer='$email'";
$result = mysqli_query($db_connect, $query);
list($id_pelanggan) = mysqli_fetch_array($result);
// insert bungkus baru
$query = "INSERT INTO m_bungkus VALUES ('', '$id_pelanggan', '$nama', '$kontak', '$alamat' )";
$result = mysqli_query($db_connect, $query);
$last_id_bungkus = mysqli_insert_id($db_connect);

date_default_timezone_set("Asia/Bangkok");
$now = date("Y-m-d H:i:s");

//error handling
echo "Error: " . $query . "<br>" . mysqli_error($db_connect);

// cek form
if (isset($_GET['produk']) && isset($_GET['jml'])) {
    // untuk pemrosesan pemesanan dari buy now
    $id_produk = $_GET['produk'];
    $jml = $_GET['jml'];

    // buat pemesanan hubungkan ke bungkus
    $query = "INSERT INTO m_pemesanan VALUES ('', '$id_produk', '$jml',0, '$now', '$last_id_bungkus')";
    $result = mysqli_query($db_connect, $query);

    //error handling
    echo "Error: " . $query . "<br>" . mysqli_error($db_connect);

    // tutup database
    mysqli_close($db_connect);
    header('location: ../summary.php?no_order='.$last_id_bungkus);
    
}else{
    // untuk pemrosesan pemesanan dari cart

    // ambil data dari cart
    $query = "SELECT * FROM m_cart WHERE m_customer_id_m_customer='$id_pelanggan'";
    $result = mysqli_query($db_connect, $query);


    
    // buat pemesanan hubungkan ke bungkus
    while(list($id_cart, $total_produk ,$id_customer, $id_produk) = mysqli_fetch_array($result)){
        $query = "INSERT INTO m_pemesanan VALUES ('', '$id_produk', '$total_produk',0, '$now', '$last_id_bungkus')";
        mysqli_query($db_connect, $query);
    }

    // hapus cart
    $query = "DELETE FROM m_cart WHERE m_customer_id_m_customer='$id_pelanggan'";
    $result = mysqli_query($db_connect, $query);

    //error handling
    //echo "Error: " . $query . "<br>" . mysqli_error($db_connect);

    // tutup database
    mysqli_close($db_connect);
    header('location: ../summary.php?no_order='.$last_id_bungkus);
}


?>