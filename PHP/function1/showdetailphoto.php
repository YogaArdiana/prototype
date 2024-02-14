<?php
require '../../config/conn.php';

$FotoID = $_GET['FotoID'];
$sql = "SELECT foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, user.Username, user.NamaLengkap, user.imgProfile, album.NamaAlbum, album.Deskripsi FROM `foto` 
INNER JOIN user ON foto.UserID = user.UserID
INNER JOIN album ON foto.AlbumID = album.AlbumID WHERE foto.FotoID = $FotoID";

$exeSql = mysqli_query($conn, $sql);
$rowSqlDetail = mysqli_fetch_assoc($exeSql);
?>