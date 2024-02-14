<?php
require '../../config/conn.php';

$sqlTotalLike = "SELECT COUNT(*) AS totallike FROM likefoto WHERE FotoID = $FotoID";
$exeSqlTotalLike = mysqli_query($conn, $sqlTotalLike);
$rowTotalLike = mysqli_fetch_assoc($exeSqlTotalLike);
$totalLike = $rowTotalLike['totallike'];

$sqlTotalKomentar = "SELECT COUNT(*) AS totalcomment FROM komentarfoto WHERE FotoID = $FotoID";
$exeSqlTotalKomentar = mysqli_query($conn, $sqlTotalKomentar);
$rowTotalKomentar = mysqli_fetch_assoc($exeSqlTotalKomentar);
$totalKomentar = $rowTotalKomentar['totalcomment'];
?>