<?php include_once('header.php'); ?> 
<?php 
if ($_SESSION['pass_group'] == "") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); // $con
require_once("pagination_function.php");
 
 ?>
<div class="uselist">  
    <div class="uselist__inner">

        <form name="form1" method="get" action="">
          <div class="search_list">   
            <input type="text" name="page" value="1" class="search_list_input" hidden="">         
            <input type="text" name="keyword" size="30" class="search_list_input">

            <select name="myselect" class="search_list_select">
              <option value="">-- Please select --</option>
              <option value="username1">Username</option>
              <option value="name1">Full name</option>
              <option value="email">E-mail</option>
            </select>
            <button type="submit" class="search_list_btn search_list_btn--modi" name="btn_search" value="search_data" >Search</button> 
          </div>       
        </form>

        <table name="userlist_table" class="userlist_table">
            <tr class="head-toppic"><td>Username</td><td>Status</td><td>Reset password</td><td>Name</td><td>Email</td><td>Group</td><td><a href="user_form.php?mode=add"><img class="icon_mode" src="images/icon_add.png" alt=""></a></td></tr>

<?php 
/*$sql = "SELECT * FROM `users` ORDER BY `username1` DESC LIMIT 5"; //print $sql;
$result = mysqli_query($con, $sql) or die ("Error in mql : $sql".mysqli_error($sql));
    foreach ($result as $rs)   { 
    $i++;
    if($i%2==0) { $bg = "#f7fcb2"; }
    else { $bg = "#FFFFFF";}*/
//-----------------------------------
$page = isset($_GET['page']) ? $_GET['page'] : ""; // echo "page = ".$page."<br>";
$btn_search = isset($_GET['btn_search']) ? $_GET['btn_search'] : ""; //  echo "btn_search = ".$btn_search."<br>";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : ""; //  echo "keyword = ".$keyword."<br>";
$myselect = isset($_GET['myselect']) ? $_GET['myselect'] : ""; //  echo "myselect = ".$myselect."<br>";

$num = 0;
$sql = " SELECT * FROM users WHERE 1 "; 

if(isset($myselect) && $keyword !=""){
  $sql.=" AND $myselect LIKE '%".trim($keyword)."%' ";    
}
  
$result=$con->query($sql);

$total=$result->num_rows;
 
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
$step_num=0;
if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==1)){   
    $_GET['page']=1;   
    $step_num=0;
    $s_page = 0;    
}else{   
    $s_page = $_GET['page']-1;
    $step_num=$_GET['page']-1;  
    $s_page = $s_page*$e_page;
}   
$sql.=" ORDER BY username1  LIMIT ".$s_page.",$e_page";

 //echo "sql = ".$sql;
$result=$con->query($sql);
if($result && $result->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    $i=0;
    while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
        $num++;

    $i++;
    if($i%2==0) { $bg = "#f7fcb2"; }
    else { $bg = "#FFFFFF";} 
 

?>

<tr bgcolor='<?php echo $bg;?>'><td><?php echo $row['username1']; ?></td><td><?php echo $row['status1']; ?></td><td><a href="user_resetpass.php?id=<?php echo $row['id'];?>"><img src="images/icon_reset_pss.png">1q2w3e4r</a></td><td><?php echo $row['name1'];?></td><td><?php echo $row['email'];?></td><td><?php echo $row['pass_group'];?></td><td class="mode"><a href="user_form.php?mode=edit&id=<?php echo $row['id'];?>"><img class="icon_mode" src="images/icon_edit.png"></a> <a href="user_form.php?mode=del&id=<?php echo $row['id'];?>"><img class="icon_mode" src="images/icon_del.png"></a></td></tr>
<?php 
}
}
 
mysqli_close($con);
?>
        </table>

        <div class="table_navi_list">
        <?php //page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page); ?>
        <?php 
          page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
        //page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page);
        //echo "page = ".$_GET['page']."<br>";
        //echo "e_page = ".$e_page."<br>";
        //echo " <a href='$_SERVER[SCRIPT_NAME]?page=1&keyword=$keyword&myselect=$myselect'>Test Link</a> ";
        ?> 
        </div>

    </div>
</div>   
 
<?php //include_once('footer.php') ?>  