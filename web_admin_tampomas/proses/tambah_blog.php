<?php

session_start();

include 'conf.php';



if (isset($_POST['add_blog'])) {

    $title_content = $_POST['title_content'];
    $desc_content = $_POST['desc_content'];
    $date_content = $_POST['date_content'];

    $pname = rand(1000, 10000) . "-" . $_FILES["image"]["name"];

    $tname = $_FILES["image"]["tmp_name"];

    $uploads_dir = 'images';

    move_uploaded_file($tname, '../../assets/image_content/' . $pname);

    $id_m_admin = $_SESSION["id_m_admin"];
    //tambah data ke database
    mysqli_query($conn, "INSERT INTO m_content VALUES('', '$title_content', '$desc_content', '$date_content', '$pname', '$id_m_admin')");

    $result = mysqli_affected_rows($conn);

    if ($result > 0) {
        header("Location: ../blog-admin.php");
    }
}
