<?php
// Start the session
session_start();

// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: ../login_form.php');
}

// cek form
if (isset($_POST['buy_now'])) {
    // setelah klik buy now
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['qty_produk'];
    header("location: ../checkout.php?produk=".$id_produk."&jml=".$jumlah);
    
}elseif (isset($_POST['add_to_cart'])) {
    // setelah klik add to cart
    $email = $_SESSION['login_email'];
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['qty_produk'];

    // buka database
    include("db_connect.php");

    // cari id customer berdasarkan email
    $query = "SELECT id_m_customer FROM m_customer WHERE email_customer='$email'";
    $result = mysqli_query($db_connect, $query);
    list($id_pelanggan) = mysqli_fetch_array($result);

    // ambil semua data di cart berdasarkan id_pelanggan dan id_produk yang sudah dimasukan
    // jika data yang dicari tidak ada, lalu masukan data cart baru
    // jika data yang dicari ada, maka update jumlah barang

    $query1 = "SELECT total_product, id_m_cart FROM m_cart WHERE m_customer_id_m_customer='$id_pelanggan' AND m_product_id_m_product='$id_produk'";
    $result = mysqli_query($db_connect, $query1);
    list($hasil, $id_cart) =  mysqli_fetch_array($result);
    if(!$hasil){
        // masukkan ke tabel cart
        $query = "INSERT INTO m_cart VALUES ('', '$jumlah', '$id_pelanggan', '$id_produk')";
        mysqli_query($db_connect, $query);

        echo mysqli_error($db_connect);
    }else{
        // tambah jumlah produk yg dibeli
        $query = "UPDATE m_cart SET total_product = total_product + $jumlah WHERE id_m_cart='$id_cart'";
        mysqli_query($db_connect, $query);

        echo mysqli_error($db_connect);
    }

    //tutup database
    mysqli_close($db_connect);
    header('location: ../cart.php');
    
} else {
    header('location: ../index.php');
}

?>
