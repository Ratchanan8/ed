<?php 
require_once('include/db.php');  
session_start(); 
if (isset($_POST['username1'])){ 
        // removes backslashes
	$username1 = stripslashes($_REQUEST['username1']); 
	$username1 = mysqli_real_escape_string($con,$username1);
	$password1 = stripslashes($_REQUEST['password1']);
	$password1 = mysqli_real_escape_string($con,$password1); 
        $sql = "SELECT * FROM `users` WHERE username1='$username1'
                and password1='".md5($password1)."'";

        $results = $con->query($sql);

                if ($results->num_rows > 0) :

                while ($row = $results->fetch_assoc() ) :

                      //  $username11 = $row['username1'] ?? null;
                     //   $email1 = $row['email'] ?? null;       
                        
                        $_SESSION['username'] = $row['username1'];
                        $_SESSION['pass_group'] = $row['pass_group'];
        
                       
                      //  header('Refresh: 3; URL=index.php');
                        //$acho_text = "ท่านกำลังเข้าสู่ระบบ";
                        echo "<script>alert('Login Successful!!');</script>";
                        echo "<script>window.location.href='index.php'</script>";
                        $con->close();
        
                        if ($_SESSION['pass_group'] == "ADM") {
                        header('Refresh: 3; URL=index.php');
                        }
                        else {
                        header('Refresh: 3; URL=index.php'); 
                        }

                endwhile;
                endif; 

         
                }                
                else{
                //$acho_text = "ชื่อผู้ใช้/รหัสผ่านไม่ถูกต้อง";
                //$links = "<a href='login.php'>คลิกที่นี่เพื่อเข้าสู่ระบบอีกครั้ง</a>";
                echo "<script>alert('User or password is incorrect!!');</script>";
                echo "<script>window.location.href='login.php'</script>";
                $con->close();
                }
           
      
 
?>  