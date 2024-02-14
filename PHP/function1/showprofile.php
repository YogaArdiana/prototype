<?php
require '../../config/conn.php';


$getUSerID = $_GET['UserID'];
$sql = "SELECT * FROM user WHERE UserID = '$getUSerID'";

$exeSqlProfile = mysqli_query($conn, $sql);

$rowSqlProfile = mysqli_fetch_assoc($exeSqlProfile);

if(isset($UserID) && isset($_GET['post'])){
    $sqlSelectPhotosProfile = "SELECT foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, user.UserID, user.Username, user.NamaLengkap, user.imgProfile, album.NamaAlbum, album.Deskripsi FROM `foto` 
    INNER JOIN user ON foto.UserID = user.UserID
    INNER JOIN album ON foto.AlbumID = album.AlbumID WHERE foto.UserID = $UserID";

    $exeSqlSelectPhotosProfile = mysqli_query($conn, $sqlSelectPhotosProfile);
}elseif(isset($UserID) && isset($_GET['album'])){
    $sqlSelectAlbumProfile = "SELECT * FROM album 
    INNER JOIN user ON album.UserID = user.UserID
    WHERE album.UserID = '$UserID'";

    $exeSelectAlbumProfile = mysqli_query($conn, $sqlSelectAlbumProfile);
}
?>