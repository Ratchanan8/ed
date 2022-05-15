<?php 
session_start();
if ($_SESSION['pass_group'] != "ADM"){ header('location: index.php'); exit();}
require_once('include/db.php');
$password1 = md5('1q2w3e4r');
$id = $_GET['id'];
$sql = "UPDATE users SET password1 = '$password1' WHERE id = '$id';"; //  echo $sql; exit();
    //$sql = "UPDATE users SET username = '$_POST['username1']', status = '$_POST['status']', name1 = '$_POST['name1']', email = '$_POST['email']', pass_group = '$_POST['pass_group']' WHERE id = '$_POST['id']';"; // ใส่ค่าตัวแปรมาจากฟอร์ม ไม่ควรทำ ให้ตั้งค่าตัวแปรข้างบนก่อน
$data1 =  $con->query($sql);
    if (isset($data1)){
        echo "<script>alert('Reset password successful!');</script>";
        echo "<script>window.location.href='user_list.php'</script>";
        $con->close(); 
    };
?>