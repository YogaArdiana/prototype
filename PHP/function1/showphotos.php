<?php
require "../../config/conn.php";

$sqlPhotos = "SELECT foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, user.UserID, user.Username, user.NamaLengkap, user.imgProfile, album.NamaAlbum, album.Deskripsi FROM `foto` 
INNER JOIN user ON foto.UserID = user.UserID
INNER JOIN album ON foto.AlbumID = album.AlbumID";

$exeSqlPhotos = mysqli_query($conn, $sqlPhotos);
?>