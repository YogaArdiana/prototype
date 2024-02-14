<?php
session_start();
require '../config/conn.php';


if(isset($_FILES['Upload']['name'])){
    $JudulFoto = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['Deskripsi'];
    $AlbumID = $_POST['AlbumID'];
    $UserID = $_SESSION['UserID'];
    $TanggalUnggah = date('Y/m/d');


    $fileName = $_FILES['Upload']['name'];
    $filetmp = $_FILES['Upload']['tmp_name'];
    $filesize = $_FILES['Upload']['size'];
    $extDiPerbolehkan = ["jpg", "png", "jpeg"];
    $targetFile = $targetFile = basename($fileName);
    $imgFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if($filesize > 500000){
        header('Location: ../view/home/?fail=Gagal Dalam Upload Gambar, Gambar Terlalu Besar');
    }else{
        if(in_array($imgFileType, $extDiPerbolehkan)){
           $newNameFile = 'IMG_UID'.$UserID.'_'.uniqid().'.'.$imgFileType;
           $upload = move_uploaded_file($filetmp, '../Upload/'.$newNameFile);
           if($upload){
                $sqlUploadPhoto = "INSERT INTO `foto`(`JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES ('$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$newNameFile','$AlbumID','$UserID')";
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

}
?>