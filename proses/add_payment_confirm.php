<?php 


include ('db_connect.php');



if (isset($_POST["add"])){

    $id_bungkus = $_POST["id_bungkus"];

    $pay_name = $_POST["pay_name"];

    $pay_email = $_POST["pay_email"];
    
    $pay_phone = $_POST["pay_phone"];

    $pay_tanggal = $_POST["pay_tanggal"];

    $pay_method = filter_input(INPUT_POST, 'pay_method', FILTER_SANITIZE_STRING);

    $pname = rand(1000, 10000) . "-" . $_FILES["image"]["name"];
    
    $tname = $_FILES["image"]["tmp_name"];
    
    $uploads_dir = 'images';
    
    move_uploaded_file($tname, '../assets/image_bukti/' . $pname);

    $pay_ket = $_POST["pay_ket"];

    // masukkan data ke payment verif
    mysqli_query($db_connect, "INSERT INTO m_payment_verif VALUES('', '$pname', '$pay_name', '$pay_email', '$pay_phone', '$pay_tanggal', '$pay_method', '$pay_ket', '$id_bungkus')");
    $result = mysqli_affected_rows($conn);

    // baca data tabel pemesanan berdasarkan id_bungkus
    include("db_connect.php"); // buka database
    $query = "SELECT * FROM m_pemesanan WHERE id_bungkus='$id_bungkus'";
    $result = mysqli_query($db_connect, $query);

    // masukkan data tadi ke tabel pembelian
    while($row = mysqli_fetch_assoc($result)){

        date_default_timezone_set("Asia/Bangkok");
        $now = date("Y-m-d H:i:s");
    
        $id_produk = $row['id_product'];
        $total_produk = $row['total_product'];
        $tanggal_pembelian = $now;
        $id_bungkus = $row['id_bungkus'];
        $query = "INSERT INTO m_pembelian VALUES ('', '$id_produk', '$total_produk', 0, '$tanggal_pembelian', '$id_bungkus')";
        mysqli_query($db_connect, $query);
        echo mysqli_error($db_connect);
    }

    // ubah status_pemesanan jadi 1 berdasarkan id_bungkus
    $query = "UPDATE m_pemesanan SET status_pemesanan=1 WHERE id_bungkus=$id_bungkus";
    mysqli_query($db_connect, $query);
    echo mysqli_error($db_connect);

    if ($result > 0) {
        header("Location: ../payment_confirm.php");
    }
}



?>