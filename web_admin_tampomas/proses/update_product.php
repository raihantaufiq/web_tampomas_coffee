<?php

include 'conf.php';

if (isset($_POST["update_product"])) {

    $id_m_product = $_POST["id_m_product"];
    $category_product = $_POST['category_product'];
    $name_product = $_POST['name_product'];
    $price_product = $_POST['price_product'];
    $desc_product = $_POST['desc_product'];
    $stock_product = $_POST['stock_product'];


    $pname = "";

    if (!empty($_FILES["image"]["name"])) {

        $pname = rand(1000, 10000) . "-" . $_FILES["image"]["name"];

        $tname = $_FILES["image"]["tmp_name"];

        $uploads_dir = 'images';

        move_uploaded_file($tname, '../../assets/image_product/' . $pname);
    } else {

        $pname = $_POST["image2"];
    }




    mysqli_query($conn, "UPDATE m_product SET 
                         category_product = '$category_product',
                         photo_product = '$pname',
                         name_product = '$name_product',
                         price_product = '$price_product',
                         desc_product = '$desc_product',
                         stock_product= '$stock_product'
                         WHERE id_m_product = '$id_m_product'");

    header("Location: ../Produk.php");
}
