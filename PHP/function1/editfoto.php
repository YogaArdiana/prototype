<?php
require '../config/conn.php';

if(isset($_POST['FotoID'])){
    $FotoID = $_POST['FotoID'];
    $JudulFoto = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['DeskripsiFoto'];
    $sqlEditFoto = "UPDATE `foto` SET `JudulFoto`='$JudulFoto',`DeskripsiFoto`='$DeskripsiFoto' WHERE FotoID = '$FotoID'";

    $result = mysqli_query($conn, $sqlEditFoto);

    if($result){
        echo "Berhasil";
    }else{
        echo "Gagal";
    }

}
?>