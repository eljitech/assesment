<?php
    // TAG : 23012021

    $SERVER = "localhost";
    $USERDB = "root";
    $KEYDB = "!!&21adi";
    $DBNAME = "db_assesment";

    $_AUTH = mysqli_connect($SERVER, $USERDB, $KEYDB, $DBNAME);

    if($_AUTH) {
        // echo "Koneksi bershasil dilakukan";
    } else {
        // echo "Koneksi gagal dilakukan";
    }
?>