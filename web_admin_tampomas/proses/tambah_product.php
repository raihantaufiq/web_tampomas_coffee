<?php

include 'conf.php';


if (isset($_POST['add_product'])) {

    $id_m_product = $_POST["id_m_product"];
    $category_product = $_POST['category_product'];
    $name_product = $_POST['name_product'];
    $price_product = $_POST['price_product'];
    $desc_product = $_POST['desc_product'];
    $stock_product = $_POST['stock_product'];

    $pname = rand(1000, 10000) . "-" . $_FILES["image"]["name"];

    $tname = $_FILES["image"]["tmp_name"];

    $uploads_dir = 'images';

    move_uploaded_file($tname, '../../assets/image_product/' . $pname);

    //tambah data ke database
    mysqli_query($conn, "INSERT INTO m_product VALUES('$id_m_product', '$category_product', '$pname', '$name_product', '$price_product', '$desc_product', '$stock_product')");

    $result = mysqli_affected_rows($conn);

    if ($result > 0) {
        header("Location: ../Produk.php");
    } 
}
