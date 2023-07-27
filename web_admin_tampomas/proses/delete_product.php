<?php 

include 'conf.php';


if (isset($_GET["id"])){

    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM m_product WHERE id_m_product='$id'");
    header("Location: ../Produk.php");
}
