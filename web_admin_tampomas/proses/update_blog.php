<?php

include 'conf.php';

if (isset($_POST["update_blog"])) {

    $idm_content = $_POST["idm_content"];
    $title_content = $_POST['title_content'];
    $desc_content = $_POST['desc_content'];
    $date_content = $_POST['date_content'];
    $m_admin_id_m_admin = $_POST['m_admin_id_m_admin'];


    $pname = "";

    if (!empty($_FILES["image"]["name"])) {

        $pname = rand(1000, 10000) . "-" . $_FILES["image"]["name"];

        $tname = $_FILES["image"]["tmp_name"];

        $uploads_dir = 'images';

        move_uploaded_file($tname, '../../assets/image_content/' . $pname);
    } else {

        $pname = $_POST["image2"];
    }




    mysqli_query($conn, "UPDATE m_content SET 
                         title_content = '$title_content',
                         desc_content = '$desc_content',
                         date_content = '$date_content',
                         photo_content = '$pname',
                         m_admin_id_m_admin= '$m_admin_id_m_admin'
                         WHERE idm_content = '$idm_content'");

    header("Location: ../blog-admin.php");
}
