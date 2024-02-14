<?php
session_start();
require '../config/conn.php';

if (isset($_GET['FotoID'])) {
    $FotoID = $_GET['FotoID'];
    $UserID = $_SESSION['UserID'];
    $sqlDeletePhotos = "DELETE FROM `foto` WHERE UserID = '$UserID' AND FotoID = '$FotoID'";

    $exeSql = mysqli_query($conn, $sqlDeletePhotos);
    if($exeSql){
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
}


?>