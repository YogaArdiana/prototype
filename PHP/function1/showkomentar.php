<?php
require '../../config/conn.php';

$FotoID = $_GET['FotoID'];
$sqlAllComentar = "SELECT * FROM `komentarfoto` 
INNER JOIN user ON komentarfoto.UserID = user.UserID
WHERE komentarfoto.FotoID = $FotoID";

$exeSqlAllComentar = mysqli_query($conn, $sqlAllComentar);

?>