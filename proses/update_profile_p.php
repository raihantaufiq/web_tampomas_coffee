<?php

// Start the session
session_start();
// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: ../login_form.php');
}

// cek form
if (isset($_POST['submit_profile'])) {
    $id_m_customer = $_POST['id_m_customer'];
    $uname_customer = $_POST['inputNama'];
    $m_kelurahan = $_POST['inputKelurahan'];
    $phone_customer = $_POST['inputNoHp'];
    $m_kecamatan = $_POST['inputKecamatan'];
    $email_customer = $_POST['inputEmail'];
    $m_kota = $_POST['inputKota'];
    $m_address = $_POST['inputAlamat'];
    $m_zipcode = $_POST['inputKodepos'];
    $m_provinsi = $_POST['inputProvinsi'];
    
}else{
    header('location: ../profile.php');
}

// buka database
include("db_connect.php");
// ubah data customer berdasarkan id
$query = "UPDATE m_customer SET 
    uname_customer='$uname_customer', 
    email_customer='$email_customer', 
    phone_customer='$phone_customer'
    WHERE id_m_customer='$id_m_customer'";

// ubah alamat customer
if (mysqli_query($db_connect, $query)) {
    $query = "UPDATE m_address SET 
    m_provinsi='$m_provinsi', 
    m_zipcode='$m_zipcode', 
    m_address='$m_address', 
    m_kota='$m_kota',
    m_kecamatan='$m_kecamatan',
    m_kelurahan='$m_kelurahan'
    WHERE m_customer_id_m_customer='$id_m_customer'";
    mysqli_query($db_connect, $query);
    //tutup database
    mysqli_close($db_connect);
    header('location: ../profile.php');

}else {
    //error handling
    echo "Error: " . $query . "<br>" . mysqli_error($db_connect);
    //tutup database
    mysqli_close($db_connect);
}
?>