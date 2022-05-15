<?php 
session_start();
if ($_SESSION['pass_group'] != "ADM"){ header('location: index.php'); exit();}
require_once('include/db.php');  
//echo "username1 = ".$_POST[username]."<br>"; // แบบนี้ไม่ควร มันจะ error ในอนาคต
 
$username1 =  $_POST['username1'];
$status1 = $_POST['status1'];
$name1 = $_POST['name1'];
$email = $_POST['email'];
$pass_group = $_POST['pass_group'];
$trn_date = date("Y-m-d H:i:s");
$id = $_POST['id'];
$password1 = md5('1q2w3e4r');
  
if($_POST['submit_mode'] == "add")  {
    $sql_check = "SELECT username FROM users WHERE username = '$username1' "; // echo $sql_check;
    $res = $con->query($sql_check);
    //$rs = $res->fetch_assoc(); //    if ($rs['username'] == $username1) 

    if  ( $res->num_rows > 0 ) {
        echo "<script>alert('Username already associated with another account!');</script>";
        echo "<script>window.location.href='user_list.php'</script>";
        $con->close(); 
    }

    else {
        $sql = "INSERT INTO users (username1 , status1 ,  name1 ,  email ,  password1 , pass_group , trn_date) VALUES ('$username1', '$status1', '$name1', '$email', '$password1', '$pass_group', '$trn_date');";
        if ( $con->query($sql)) {
            echo "<script>alert('Save Successful!');</script>";
            echo "<script>window.location.href='user_list.php'</script>";
            $con->close(); 
        };
    }


} elseif ($_POST['submit_mode'] == "edit")  {
    $sql = "UPDATE users SET username1 = '$username1', status1 = '$status1', name1 = '$name1', email = '$email', pass_group = '$pass_group', trn_date = '$trn_date' WHERE id = '$id';";  //echo $sql;
    //$sql = "UPDATE users SET username = '$_POST['username1']', status = '$_POST['status']', name1 = '$_POST['name1']', email = '$_POST['email']', pass_group = '$_POST['pass_group']' WHERE id = '$_POST['id']';"; // ใส่ค่าตัวแปรมาจากฟอร์ม ไม่ควรทำ ให้ตั้งค่าตัวแปรข้างบนก่อน
    if ( $con->query($sql)) {
        echo "<script>alert('Edit Successful!');</script>";
        echo "<script>window.location.href='user_list.php'</script>";
        $con->close(); 
    };

} elseif ($_POST['submit_mode'] == "del") {
    $sql = "DELETE FROM users WHERE id = '$id';";
 
    if ( $con->query($sql)) {
        echo "<script>alert('Delete Successful!');</script>";
        echo "<script>window.location.href='user_list.php'</script>";
        $con->close();
    };

} else {
    header('location: user_list.php');
   
}
 ?>

 