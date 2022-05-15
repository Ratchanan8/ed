<?php include_once('header.php'); ?> 
<?php
if ($_SESSION['pass_group'] != "ADM"){ header('location: index.php'); exit();}

require_once('include/db.php'); // $con
require_once("pagination_function.php");

include_once('include/fun.php');
$conn = new DB_con();  
?>
<div class="uselist">  
    <div class="uselist__inner">

        <form name="form1" method="get" action="">
          <div class="search_list">   
            <input type="text" name="page" value="1" class="search_list_input" hidden="">         
            <input type="text" name="keyword" size="30" class="search_list_input">

            <select name="myselect" class="search_list_select">
              <option value="">-- Please select --</option>
              <option value="question">คำถาม</option>
              <option value="url_ref">ข้อความอ้างอิง</option> 
            </select>
            <button type="submit" class="search_list_btn search_list_btn--modi" name="btn_search" value="search_data" >Search</button> 
          </div>       
        </form>

        <table name="userlist_table" class="userlist_table">
            <tr class="head-toppic"><td>Question_id</td><td>Question_group</td><td>Question</td><td>url_ref </td><td><a href="question_form.php?mode=add"><img class="icon_mode" src="images/icon_add.png" alt=""></a></td></tr>

<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';
$btn_search = isset($_GET['btn_search']) ? $_GET['btn_search'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$myselect = isset($_GET['myselect']) ? $_GET['myselect'] : '';

$num = 0;
$sql = " SELECT * FROM question WHERE 1 "; 

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
$sql.=" ORDER BY question_id DESC LIMIT ".$s_page.",$e_page";//echo "sql = ".$sql;
$result=$con->query($sql);
if($result && $result->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    while($row = $result->fetch_assoc()){
        // เอาค่าเล็กๆมาแสดง
         $sql_sub = "SELECT name1 FROM question_group WHERE id = '$row[question_group]' ";
        $res_sub = $con->query($sql_sub);
        $rs_sub = $res_sub->fetch_assoc(); 
        /*$qg = isset($row[question_group]) ? $row[question_group] : '1';
        $sel_qg = isset($qg) ? $qg : ''; 
        $pg_name1 = $conn->s1f('name1','question_group','id',$sel_qg);*/

        $qid = $row['question_id'];
        // วนลูปแสดงรายการ
        $num++;

        $i = isset($i) ? $i : '';
        $i++;
    if($i%2==0) { $bg = "#f7fcb2"; }
    else { $bg = "#FFFFFF";} 
?>

<tr bgcolor="<?php echo $bg;?>"><td><?php echo $qid;?>&nbsp;&nbsp;<a href="test_view.php?qid=<?php echo $qid;?>" target="new"><img src="images/form_show.png"></a></td><td><?php echo $row['question_group'].":".$rs_sub['name1']; ?></td><td><a href="q_a_form.php?mode=add&id=<?php echo $row['question_id'];?>"><img src="images/QandA.png"></a><?php echo substr($row['question'], 0, 200);?></td><td><?php echo substr($row['url_ref'], 0, 10);?></td><td class="mode"><a href="question_form.php?mode=edit&id=<?php echo $row['question_id'];?>"><img class="icon_mode" src="images/icon_edit.png"></a> <a href="question_form.php?mode=del&id=<?php echo $row['question_id'];?>"><img class="icon_mode" src="images/icon_del.png"></a></td></tr>
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
        ?> 
        </div>

    </div>
</div>   

<?php //include_once('footer.php') ?>  