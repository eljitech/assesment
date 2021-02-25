<?php

    include '../../config/connection.php';

    // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $ta = $_POST['kode_tahunajaran'];

        // Mengecek Total Data pada Rombel Kelas
        $totalrombel = "SELECT COUNT(*) FROM tbl_rombelkelas WHERE kode_tahunajaran = 2020";
        // Eksekusi Query
        $ext = mysqli_query($_AUTH, $totalrombel);
        // Ambil Data yang sudah di request tadi oleh query yang barusan dijalankan
        $total = mysqli_fetch_assoc($ext);

        echo "Data jumlah " . $total['total'];


    // } else {
    //     // Request POST belum terpenuhi
    //     $response["message"] = trim("Oops! Sory, Request API ini membutuhkan parameter!.");
    //     $response["code"] = 400;
    //     $response["status"] = false;

    //     echo json_encode($response);
    // }
?>