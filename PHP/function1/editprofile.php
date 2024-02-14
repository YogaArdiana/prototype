<?php
session_start();
require '../config/conn.php';
$UserID = $_SESSION['UserID'];
if(!($_FILES['Upload']['name'] == "") && isset($_POST['NamaLengkap'])){
    $fileName = $_FILES['Upload']['name'];
    $filetmp = $_FILES['Upload']['tmp_name'];
    $filesize = $_FILES['Upload']['size'];
    $extDiPerbolehkan = ["jpg", "png", "jpeg"];
    $targetFile = $targetFile = basename($fileName);
    $imgFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    $email = $_POST['Email'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];

    if($filesize > 500000){
        header('Location: ../view/editfoto/?UserID='.$UserID.'fail=Gagal Dalam Upload Gambar, Gambar Terlalu Besar');
    }else{
        if(in_array($imgFileType, $extDiPerbolehkan)){
           $newNameFile = 'IMG_UID'.$UserID.'_'.uniqid().'.'.$imgFileType;
           $upload = move_uploaded_file($filetmp, '../Upload/'.$newNameFile);
           if($upload){
                $sqlUploadPhoto = "UPDATE `user` SET `Email`='$email',`NamaLengkap`='$NamaLengkap',`Alamat`='$Alamat',`imgProfile`='$newNameFile' WHERE user.UserID = $UserID";
                $exeSql = mysqli_query($conn, $sqlUploadPhoto);
                if($exeSql){
                    echo "Berhasil Upload Gambar";
                    header('Location: ../view/home/?success=Berhasil Upload Gambar');
                }else{
                    header('Location: ../view/home/?fail=Gagal');
                }
           }else{
            header('Location: ../view/home/?fail=Gagal Dalam Upload Gambar');
           }

        }else{
            header('Location: ../view/home/?fail=Gagal Dalam Upload Gambar Exstensi Gambar Tidak Diperbolehkan');
        }
    }

    $sqlEditProfile = "UPDATE `user` SET `Email`='',`NamaLengkap`='',`Alamat`='',`imgProfile`='' WHERE user.UserID = $UserID";
}elseif(isset($_POST['NamaLengkap'])){
    $email = $_POST['Email'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];
    $sqlEditProfile = "UPDATE `user` SET `Email`='$email',`NamaLengkap`='$NamaLengkap',`Alamat`='$Alamat' WHERE user.UserID = $UserID";

    $result = mysqli_query($conn, $sqlEditProfile);
    if($result){
        echo "berhasil";
    }else{
        echo "gagal";
    }
}
?>