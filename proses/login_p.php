<?php

// Start the session
session_start();

// cek form
if (isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
} else {
    header('location: ../login_form.php');
}


// buka database
include("db_connect.php");

// cari di tabel customer
$query = "SELECT id_m_customer, email_customer, pass_customer FROM m_customer WHERE email_customer='$email'";
$result = mysqli_query($db_connect, $query);
list($res_id_customer, $res_email_customer, $res_password_customer) = mysqli_fetch_array($result);

// cari di tabel admin
$query = "SELECT id_m_admin, email_admin, pass_admin, nama_admin FROM m_admin WHERE email_admin='$email'";
$result = mysqli_query($db_connect, $query);
list($res_id_m_admin, $res_email_admin, $res_password_admin, $res_nama_admin) = mysqli_fetch_array($result);

// tutup database
mysqli_close($db_connect);

// validasi kustomer
if (($email == $res_email_customer) && ($password == $res_password_customer)) {
    // login kostumer berhasil
    $_SESSION["login_email"] = $res_email_customer;
    $_SESSION["id_m_customer"] = $res_id_customer;
    // masuk ke web utama
    header('location: ../index.php');
}
// validasi admin
elseif (($email == $res_email_admin) && ($password == $res_password_admin)) {
    // login admin berhasil
    $_SESSION["login_email"] = $res_email_admin;
    $_SESSION["login_email_admin"] = $res_email_admin;
    $_SESSION["id_m_admin"] = $res_id_m_admin;
    $_SESSION["nama_admin"] = $res_nama_admin;
    // masuk ke web tampilan admin
    header('location: ../web_admin_tampomas/dashboard.php');
} else {
    // error message pakai cookie //
    header('location: ../login_form.php');
}
