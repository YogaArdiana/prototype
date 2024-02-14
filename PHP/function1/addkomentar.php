<?php
require '../config/conn.php';

if(isset($_POST['submit'])){
    $isiKomentar = $_POST['isikomentar'];
    $tanggalKomentar = date('Y/m/d');
    $UserID = $_POST['UserID'];
    $FotoID = $_POST['FotoID'];

    $sql = "INSERT INTO `komentarfoto`(`FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES ('$FotoID','$UserID','$isiKomentar','$tanggalKomentar')";

    $exeSql = mysqli_query($conn, $sql);
    if($exeSql){
        echo "Berhasil Komentar";
        header("Location: ../view/showimage/?FotoID=".$FotoID."&success=Berhasil Menambahkan Komentar");
    }else{
        header("Location: ../view/showimage/?FotoID=".$FotoID."&fail=Gagal Menambahkan Komentar");
    }
}
?>