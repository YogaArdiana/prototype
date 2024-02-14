<?php
require '../config/conn.php';



if(isset($_POST['submit'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $NamaLegkap = $_POST['NamaLengkap'];
    $Alamat = $_POST['Alamat'];
    $PasswordHash = password_hash($Password, PASSWORD_DEFAULT);
    $DefaultImg = '1.jpeg';


    $validation = "SELECT * FROM user WHERE Username = '$Username'";
    $exeValidation = mysqli_query($conn, $validation);
    $rowValidation = mysqli_fetch_assoc($exeValidation);


    if($rowValidation > 0){
        header('Location: ../view/auth/register.php?fail=Username Sudah Ada');
    }else{
        $sql = "INSERT INTO user (Username, Password, Email, NamaLengkap, Alamat, ImgProfile) VALUES ('$Username', '$PasswordHash', '$Email', '$NamaLegkap', '$Alamat', '$DefaultImg')";
    
        $Execution = mysqli_query($conn, $sql);
    
        if($Execution){
            header('Location: ../view/auth/register.php?success=Berhasil Register');
        }else{
            header('Location: ../view/auth/register.php?fail=Gagal Register');
        }
    }



}
?>