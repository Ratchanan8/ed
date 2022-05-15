<?php 
include_once('fun.php');
//echo sf('name1','users','username1','fefe'); // ใช้งานแบบที่ 1 //

$usernamecheck = new DB_con(); // แบบที่2
echo $usernamecheck->s1f('name1','users','username1','fefe'); // แบบที่2  ต้องประกาศ new DB_con() ก่อนใช้งาน
echo "<br>";
echo $usernamecheck->s2f('name1','users','status1','1','pass_group','USE');  
echo "<br>";

// Getting post value
$uname = $_SESSION['username'];  

$sql = $usernamecheck->usernameavailable($uname);

$num = mysqli_num_rows($sql);

if ($num > 0) {
    echo "<span style='color: red;'>Username already associated with another account.</span>";
    //echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    echo "<span style='color: green;'>Username available for registration.</span>";
   // echo "<script>$('#submit').prop('disabled', false);</script>";
}
?>