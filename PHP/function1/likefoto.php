<?php
require '../config/conn.php';

if(isset($_GET['UserID']) && isset($_GET['FotoID'])){
    
    $UserID = $_GET['UserID'];
    $FotoID = $_GET['FotoID'];
    $Tanggallike = date('Y/m/d');

    $validationLike = "SELECT * FROM likefoto WHERE UserID = '$UserID' AND FotoID = '$FotoID'";
    $exeValidationLike = mysqli_query($conn, $validationLike);
    $rowValidationLike = mysqli_fetch_assoc($exeValidationLike);

    if($rowValidationLike > 0){
        $likeID = $rowValidationLike['LikeID'];
        $sqlRemoveLike = "DELETE FROM `likefoto` WHERE LikeID = $likeID";
        $exeSqlRemoveLike = mysqli_query($conn, $sqlRemoveLike);
        header('Location: ../view/showimage/?FotoID='.$FotoID);
    }else{
        $sql = "INSERT INTO `likefoto`(`FotoID`, `UserID`, `TanggalLike`) VALUES ('$FotoID','$UserID','$Tanggallike')";
    
        $exeSql = mysqli_query($conn, $sql);
    
        if($exeSql){
            header('Location: ../view/showimage/?FotoID='.$FotoID);
        }else{
            echo "Gagal";
        }
    }

}


?>