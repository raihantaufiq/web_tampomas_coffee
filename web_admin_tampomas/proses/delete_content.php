<?php

include 'conf.php';


if (isset($_GET["id"])) {

    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM m_content WHERE idm_content='$id'");
    header("Location: ../blog-admin.php");
}
