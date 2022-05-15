<?php include_once('header.php'); ?> 
<?php 
if ($_SESSION['pass_group'] == "") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); 
require_once('include/fun.php'); 
$db_con = new DB_con(); 

$submit_mode = isset($_POST['submit_mode']) ? $_POST['submit_mode'] : ''; 
$total_toppic = isset($_POST['total_toppic']) ? $_POST['total_toppic'] : ''; 

if  ($submit_mode == "add_tempdata") {
    
    $sql_del_temp = "DELETE FROM `test_temp` WHERE `username1` = '$sUser' "; echo "sql del = ".$sql_del_temp."<br>";
    $con->query($sql_del_temp); 

    echo "Transfer data to test_temp database and then redirect to form test"."<br>";
    $sql = "SELECT question_id FROM question order by RAND() LIMIT 0,$total_toppic"; echo "Random record = ".$sql."<br>";
    $results = $con->query($sql); 
    if ($results->num_rows > 0) :
        while($row = $results->fetch_assoc()):
        $q_id = $row['question_id'];
        // เอาข้อมูลไปใส่ใน temp
        $sql_temp = "INSERT INTO test_temp (username1, question_id, answer_self, score, mark) VALUES ('$sUser', '$q_id', '0', '0','');"; echo "Loop insert = ".$sql_temp."<br>";
        $res_temp = $con->query($sql_temp);
 
        endwhile;  
    endif;
    $qid = $db_con->s1f('question_id','test_temp','username1',$sUser);
    $con->close(); 
    header("Location:test_form.php?qid=$qid"); 
    //header("Location:test_form.php?total_toppic=$total_toppic"); 
}
else {
    echo "";
}

?>
<div class="formTest">
    <div class="formTest__inner">
        <h3>เลือกจำนวนที่จะเริ่มทดสอบ</h3> 
        <form action="" method="post">
        <select name="total_toppic" require>
                <option value="10" selected="selected">10 ข้อ</option>
                <option value="20">20 ข้อ</option>
                <option value="30">30 ข้อ</option>

              </select> <br>
              <button type="submit" name="submit_mode" value="add_tempdata" >เริ่มทำข้อสอบ</button> 
        </form>
    </div>  
</div>
<?php include_once('footer.php') ?>  