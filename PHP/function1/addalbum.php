<?php
require '../config/conn.php';

if(isset($_POST['submit']) && isset($_POST['UserID'])){
    echo $UserID = $_POST['UserID'];
    echo $NamaAlbum = $_POST['NamaAlbum'];
    echo $Deskripsi = $_POST['Deskripsi'];
    $TanggalDibuat = date('Y/m/d');

    $sql = "INSERT INTO `album`(`NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`) VALUES ('$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')";

    $exeSql = mysqli_query($conn, $sql);

    if($exeSql){
        header('Location: ../view/album/?success=Berhasil Menambahkan Album');
    }else{
        header('Location: ../view/album/?fail=Gagal Menambahkan Album');
    }
}else{
    header('Location: ../view/album/?fail=Gagal Menambahkan Album Silakan Login');  
}
?>