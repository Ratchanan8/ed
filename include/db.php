<?php 
 /* define('DB_SERVER', 'localhost'); // Your hostname
  define('DB_USER', 'root'); // Database Username
  define('DB_PASS', 'root'); // Database Password
  define('DB_NAME', 'ed_db'); // Database Name

  class DB_con {
      function __construct() {
          $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
          $this->dbcon = $conn;

          if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
      }
    }*/
?>

<?php 
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = 'root';
$db_name = 'ed_db'; 
 
// เดิม $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
// ติดต่อฐานข้อมูลใช้ได้ทั้งสองแบบ แต่ new mysqli มันคือฟังชั่น สังเกตุที่สี
$con = new mysqli($db_host, $db_user, $db_pwd, $db_name);
 //$this->dbcon = $con;
if ($con->connect_error) {
    echo $con->connect_error;
} //else { echo "Connect success";} 
?>