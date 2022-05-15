<?php 
require_once('include/db.php');   

//$username = stripslashes($_REQUEST['username']);
//$email = stripslashes($_REQUEST['email']);
$un = stripslashes($_REQUEST['username']);
$em = stripslashes($_REQUEST['email']);
$username = isset($un) ? $un : "";
$email = isset($em) ? $em : "";

$sql = "SELECT * FROM `users` WHERE `username1` = '$username' or `email` = '$email' ";
$results = $con->query($sql);
 

if ($results->num_rows > 0) :

    while ($row = $results->fetch_assoc() ) :
        $username1 = isset($row['username1']) ? $row['username1'] : ''; 
        $email1 = isset($row['email']) ? $row['email'] : ''; 
        //$username1 = $row['username1'] ?? null;
        //$email1 = $row['email'] ?? null;       
        
    endwhile;
endif;

//echo "username1 = ".$username1."<br>";
//echo "email1 = ".$email1;


if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
    //$acho_text = "Email format is incorrect!!"; 
    //$links = "<a href='regis.php'>คลิกที่นี่เพื่อสมัครใหม่อีกครั้ง</a>";
    echo "<script>alert('Email format is incorrect!!');</script>";
    echo "<script>window.location.href='regis.php'</script>";
    $con->close();
    
}
elseif($_REQUEST['password'] != $_REQUEST['password2']) {
    //$acho_text = "<center>รหัสผ่านทั้งสองที่ท่านกรอก<br><br>ไม่เหมือนกัน</center>";  
    //$links = "<a href='regis.php'>คลิกที่นี่เพื่อสมัครใหม่อีกครั้ง</a>";
    echo "<script>alert('Both passwords are not the same!!');</script>";
    echo "<script>window.location.href='regis.php'</script>";
    $con->close();
}
elseif (isset($username) ==  isset($username1)) {
    //$acho_text = "<center>ยูสเซอร์เนมซ้ำ<br><br>อาจมีผู้ใช้ชื้อนี้อยู่แล้ว</center>";  
    //$links = "<a href='regis.php'>คลิกที่นี่เพื่อสมัครใหม่อีกครั้ง</a>";
    echo "<script>alert('Username is already to use!!');</script>";
    echo "<script>window.location.href='regis.php'</script>";
    $con->close();
}
elseif (isset($email) == isset($email1)) {
    //$acho_text = "อีเมล์ซ้ำหรืออาจมีผู้ใช้อีเมล์นี้อยู่แล้ว";  
    //$links = "<a href='regis.php'>คลิกที่นี่เพื่อสมัครใหม่อีกครั้ง</a>";
    echo "<script>alert('E-mail is already to use!!');</script>";
    echo "<script>window.location.href='regis.php'</script>";
    $con->close();
}
//---------

elseif (isset($_REQUEST['username'])){
	$name1 = stripslashes($_REQUEST['name1']);
    $newUser = mysqli_real_escape_string($con,$username);
    $newName1 = mysqli_real_escape_string($con,$name1);
    $newEmail = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    /*$newUser = mysqli_real_escape_string($this->dbcon,$username);
    $newName1 = mysqli_real_escape_string($this->dbcon,$name1);
    $newEmail = mysqli_real_escape_string($this->dbcon,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($this->dbcon,$password);*/
	$trn_date = date("Y-m-d H:i:s");


    $query = "INSERT into `users` (username1, name1, password1, email, trn_date, pass_group, status1)
    VALUES ('$newUser', '$newName1', '".md5($password)."', '$newEmail', '$trn_date', 'USE', '1')";
        $result = mysqli_query($con,$query);
        //echo "ดูค่าเฉยๆ=".$result."<br>";
        //$acho_text = "สมัครสมาชิกสำเร็จแล้ว"; 
        //$links = "<a href='login.php'>คลิกที่นี่เพื่อเข้าสู่ระบบ</a>";
        echo "<script>alert('Register Successful!!');</script>";
        echo "<script>window.location.href='login.php'</script>";
        $con->close();
         
 } ?>   