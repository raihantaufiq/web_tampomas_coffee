<?php

if (isset($_POST['submit_signup_2'])) {
    $uname_customer = $_POST['uname_customer'];
    $email_customer = $_POST['email_customer'];
    $pass_customer = $_POST['pass_customer'];
    $phone_customer = $_POST['phone_customer'];
    $m_address = $_POST['m_address'];
    $m_kelurahan = $_POST['m_kelurahan'];
    $m_kecamatan = $_POST['m_kecamatan'];
    $m_kota = $_POST['m_kota'];
    $m_provinsi = $_POST['m_provinsi'];
    $m_zipcode = $_POST['m_zipcode'];
}else{
    header('location: signup_1.php');
}


// buka database
include("db_connect.php");

// cek apakah email sudah terpakai di database
// 
$query = "SELECT email_admin FROM m_admin WHERE email_admin='$email_customer'";
$res = mysqli_query($db_connect, $query);
list($taken_email_admin) = mysqli_fetch_array($res);
if ($email_customer == $taken_email_admin) {
    header('location: ../signup_1.php');
    echo mysqli_error($db_connect);

}
//
$query = "SELECT email_customer FROM m_customer WHERE email_customer='$email_customer'";
$res = mysqli_query($db_connect, $query);
list($taken_email) = mysqli_fetch_array($res);
if ($email_customer == $taken_email) {
    header('location: ../signup_1.php');
    // echo mysqli_error($db_connect);
}


// encrypt password

// masukan data customer
$query = "INSERT INTO m_customer VALUES ('', '$uname_customer', '$email_customer', '$pass_customer', '$phone_customer')";

// masukan alamatnya
if (mysqli_query($db_connect, $query)) {
    $last_id = mysqli_insert_id($db_connect);
    $query = "INSERT INTO m_address VALUES ('', '$m_provinsi', '$m_zipcode', '$m_address', '$m_kota', '$m_kecamatan', '$m_kelurahan', '$last_id')";
    mysqli_query($db_connect, $query);
    //tutup database
    mysqli_close($db_connect);
    header('location: ../login_form.php');

}else {
    //error handling
    echo "Error: " . $query . "<br>" . mysqli_error($db_connect);
    //tutup database
    mysqli_close($db_connect);
}


?>