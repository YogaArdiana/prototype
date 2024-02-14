<?php
require '../../config/conn.php';

$sql = "SELECT * FROM album WHERE UserID = '$UserID'";

$exeSql = mysqli_query($conn, $sql);
?>