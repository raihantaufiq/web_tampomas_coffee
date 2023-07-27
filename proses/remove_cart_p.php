<?php
// Start the session
session_start();

// cek session
if (!isset($_SESSION["login_email"])) {
    header('location: ../login_form.php');
}

// cek form
if (isset($_GET['id_cart'])) {
    include("db_connect.php");
    $id_cart = $_GET['id_cart'];
    $query = "DELETE FROM m_cart WHERE id_m_cart='$id_cart'";
    $result = mysqli_query($db_connect, $query);
    echo mysqli_error($db_connect);
    header('location: ../cart.php');
    
}else{
    header('location: ../cart.php');
}


?>