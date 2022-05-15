<?php include_once('header.php'); 
if ($_SESSION['pass_group'] == "") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); 
require_once("pagination_function_test.php");
require_once('include/fun.php'); 
$db_con = new DB_con(); 

$sql_count_tp = $con->query("SELECT COUNT(*) FROM test_temp WHERE username1 = '$sUser'");
$rs_total_toppic = $sql_count_tp->fetch_row(); //hold to
$total_toppic = $rs_total_toppic[0]; // จำนวนข้อทั้งหมด
 

$qid = isset($_GET['qid']) ? $_GET['qid'] : '';   // รับค่าจากคลิกลิ้งค์
$qid2 = isset($_POST['qid2']) ? $_POST['qid2'] : ''; // รับค่าจาก form

if (($qid == "") and ($qid2 == "")) { //echo "ไม่มีqid"."<br>";
  $sql_toppic = "SELECT * FROM test_temp WHERE username1 = '$sUser' ORDER BY question_id ASC ";
  //echo "sql_toppic = ".$sql_toppic."<br>";
}
elseif (($qid != "") and ($qid2 == "")) {  //echo "qid1"."<br>";
    $qid = $qid;
    $sql_toppic = "SELECT * FROM test_temp WHERE username1 = '$sUser' and question_id = '$qid'";
    //echo "sql_toppic = ".$sql_toppic."<br>";
}
elseif (($qid == "") and ($qid2 != "")) {  //echo "qid2"."<br>";
    $qid = $qid2;
    $sql_toppic = "SELECT * FROM test_temp WHERE username1 = '$sUser' and question_id = '$qid2'";
    //echo "sql_toppic = ".$sql_toppic."<br>";
  }

$query_toppic = mysqli_query($con, $sql_toppic);
$rs = mysqli_fetch_assoc($query_toppic);  //echo "Frist record  question_id = ".$rs['question_id'];
 
$qname = $db_con->s1f('question','question','question_id',$qid);
$qphoto = $db_con->s1f('photo','question','question_id',$qid);
$ans_self = $rs['answer_self']; //echo "<br>answer_id ที่เราตอบ = ".$ans_self; //เอาไว้เช็ค radio หลังจากตอบคำถามไปแล้ว
////เอาไว้แสดงเวลาทดสอบโปรแกรม ลบออกทีหลัง
$show_answer = $db_con->s2f('answer','answer','question_id',$qid,'result','1');  //เอาไว้แสดงเวลาทดสอบโปรแกรม ลบออกทีหลัง
$correct_ans = $db_con->s2f('answer_id','answer','question_id',$qid,'result','1');  // คำตอบที่ถูกต้อง จากฐาน
//echo "<br>answer_id ที่โปรแกรมตอบ = ".$correct_ans; //เอาไว้แสดงเวลาทดสอบโปรแกรม ลบออกทีหลัง
//------------------------------------------

//---------------------------รับค่าจาก form
$submit_mode = isset($_POST['submit_mode']) ? $_POST['submit_mode'] : '';
if ($submit_mode == "edit") { 
    // ค่าของ radio จะมีค่าเป็น 0 กับ 1 เท่านั้น ถ้าคำตอบเป็น 1 แสดงว่าได้หนึ่งคะแนน
    echo "<br>radio = ".$_POST['radio'];
    $sub_radio = explode(" ", $_POST['radio']); // echo "<br>sub_radio = ".$sub_radio[1]; 
    if ($sub_radio[0] == "1") {
        //ได้คะแนน
        $sql_addScore = "UPDATE  test_temp  SET  answer_self ='$sub_radio[1]', score = '1', mark ='' WHERE username1 = '$sUser' and question_id = '$qid'";
        header("Location:test_form.php?qid=$qid"); 
    } else {
        $sql_addScore = "UPDATE  test_temp  SET  answer_self ='$sub_radio[1]', score = '0', mark ='' WHERE username1 = '$sUser' and question_id = '$qid'";
        header("Location:test_form.php?qid=$qid"); 
    }
    mysqli_query($con, $sql_addScore); 
    
} elseif ($submit_mode == "finish") {
    header("Location:test_sum.php");
}
?> 
<div class="formTest">
<div class="formTest__inner">

    <div class="formTest__content">
        
        <h3>จำนวนที่จะทดสอบ <?php echo $total_toppic; ?> ข้อ</h3> 
        <div class="formTest__pageNation"><?php 
                $sql_navi = "SELECT * FROM `test_temp` WHERE `username1` = '$sUser' ORDER BY question_id ASC";  //echo "navi = ".$sql_navi;
                $qr_sql_navi = mysqli_query($con, $sql_navi);
                $i = 1;
                while($row = $qr_sql_navi->fetch_assoc()) :
                    $ch_ans_bg = $db_con->s1f('question_id','test_temp','answer_self',0); // ถ้ามันเป็น 0 มันจะต้องมีพื้นสีแดง แสดงว่ายังไม่ได้ตอบคำถาม
                    $qid_Link = $row['question_id'];

                    if ($row['answer_self'] == '0') {
                        echo "<a href='test_form.php?qid=$qid_Link' style='color: red;'>".$i."</a> &nbsp;&nbsp;&nbsp;";
                    } else {
                        echo "<a href='test_form.php?qid=$qid_Link'>".$i."</a>&nbsp;&nbsp;&nbsp;";
                    }

                    $i++ ;
                    
                endwhile;
        ?></div>

        <form name="form1" method="post" action="test_form.php" class="form_question">
         <input type="text" name="qid2" value="<?php echo $qid; ?>" hidden> 
         
                <div class="question">
                  <?php 
                    echo "<h5>".$qname."?</h5>"; // คำถาม 
                    echo "<span style='color: #F50206'>I will delete after. The answer is = ".$show_answer."</span><br>";
                    if ($qphoto == "") { echo "";} else {echo "<img src='img_trafik/".$qphoto."'>";}
                    
                  ?>  
                  
                </div> 

                <div class="answerSelect"> 
                    <?php 
                    // loop แสดงช้อย
                    $loopans = $con->query("SELECT * FROM `answer` WHERE `question_id` = '$qid'");
                    while($loop_ans = $loopans->fetch_assoc()) :
                        $anshoto = $loop_ans['photo'];

                        $correct_result = $loop_ans['result']; 
                        $answer_id_from_program  = $loop_ans['answer_id']; 

                        // เช็ค radio ที่เราตอบไป มันตรงกับที่ Loop ให้แสดงเป็น checked='checked'
                        if ($ans_self == $answer_id_from_program)  {
                            echo "<input type='radio' name='radio' value='$correct_result $ans_self' checked='checked' >".$loop_ans['answer'];
                        }else {
                            echo "<input type='radio' name='radio' value='$correct_result $answer_id_from_program' >".$loop_ans['answer'];
                        }
            
                        if ($anshoto == "")  { echo "";} else {echo "<br><img src='img_trafik_ans/".$anshoto."' width='250'>";} 
                        echo "<br><hr><br>";
                    endwhile; ?>                                        
                </div>

                <div class="btn_svara">
                    <button type="submit" name="submit_mode" value="edit" >Answer</button>  &nbsp;&nbsp;&nbsp;
                    <button type="submit" name="submit_mode" value="finish" >Send all answers</button>
                </div>

             
             
        </form>


         
    </div> 
 
</div>
</div> 
<?php include_once('footer.php') ?>  
 