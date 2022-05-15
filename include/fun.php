<?php  
//session_start(); //echo "user = ".$_SESSION['username'];
 
define('DB_SERVER', 'localhost'); // Your hostname
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
    
  public function usernameavailable($uname) {
    $checkuser = mysqli_query($this->dbcon, "SELECT name1 FROM users WHERE username1 = '$uname'");
    return $checkuser;
  }
    // ใช้งานแบบที่ 2
  public function s1f($selfield,$db1,$whepara1,$para1){
    $sql = " SELECT $selfield FROM $db1 WHERE $whepara1 = '$para1'";
    $query = mysqli_query($this->dbcon,$sql);
    $row = mysqli_fetch_array($query,MYSQLI_NUM); 
    if (isset($row[0])) {return $row[0];}
    else {return "";}
    

    // ใช้งาน $usernamecheck = new DB_con(); // แบบที่2 include_once('fun.php') เข้ามาก่อน แล้วพิมพ์ทั้งสองบรรทัดนี้ 
    // echo $usernamecheck->s1f('name1','users','username1','fefe');
  }
  public function s2f($selfield,$db1,$whepara1,$para1,$whepara2,$para2){
    $sql = " SELECT $selfield FROM $db1 WHERE $whepara1 = '$para1'and $whepara2 = '$para2' ";
    $query = mysqli_query($this->dbcon,$sql);
    $row = mysqli_fetch_array($query,MYSQLI_NUM); 
    if (isset($row[0])) {return $row[0];}
    else {return "";}
 
  }
     
}




// ใช้งานได้ ห้ามลบ ใช้งานแบบที่ 1  //
function sf($selfield,$db1,$whepara1,$para1){
     
        $mysqli = new mysqli("localhost","root","root","ed_db"); $mysqli->set_charset("utf8");
        $sql = " SELECT $selfield FROM $db1 WHERE $whepara1 = '$para1' ";
        $query = $mysqli->query($sql);
        $row = $query->fetch_array();
      
        return $row[0];
        //return $row[$selfield]; // return บรรทัดนี้ก็ได้
        // ใช้งาน echo sf('name1','users','username1','fefe');
} // ใช้งานได้ ห้ามลบ ใช้งานแบบที่ 1 //
?>