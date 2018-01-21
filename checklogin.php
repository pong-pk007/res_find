<?php
session_start();
include './config/connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE user_name = '$username' AND user_pass = '$password'";

$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($query);
if ($result) {
    $_SESSION['USER_ID'] = $result['user_id'];
    $_SESSION['USER_NAME'] = $result['user_name'];
    $_SESSION['USER_TH_NAME'] = $result['user_th_name'];
    session_write_close();
    
    echo "<script>window.location='index.php';</script>";
}  
else {
    echo "<script>alert('ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง')</script>";
    echo "<script>window.location='login.php';</script>";
    exit();
    }

sqlsrv_close($conn);
?>






