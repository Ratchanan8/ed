<?php 
session_start();
session_destroy();
//header('Refresh: 3; URL=index.php');
echo "<script>alert('Logout Successful!!');</script>";
echo "<script>window.location.href='index.php'</script>";
       
	 
?>  

