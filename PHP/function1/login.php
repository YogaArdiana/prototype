<?php
session_start();
require '../config/conn.php';

if(isset($_POST['submit']) && isset($_POST['Username'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $CheckUser = "SELECT * FROM user WHERE Username = '$Username'";
    $exeCheckUser = mysqli_query($conn, $CheckUser);
    $rowCheckUser = mysqli_fetch_assoc($exeCheckUser);

    if($rowCheckUser > 0){
        $passwordCheck = password_verify($Password, $rowCheckUser['Password']);

        if($passwordCheck){
            $_SESSION['UserID'] = $rowCheckUser['UserID'];
            header('Location: ../view/home/?success=Berhasil Login');
        }else{
            header('Location: ../view/auth/login.php?fail=Gagal Login Password Salah');
        }
    }else{
        header('Location: ../view/auth/login.php?fail=Gagal Login Username Tidak Ada');
    }
}


?>