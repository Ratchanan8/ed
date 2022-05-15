<?php include_once('header.php'); 
if ($_SESSION['pass_group'] == "") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); 
require_once("pagination_function_test.php");
require_once('include/fun.php'); 
$db_con = new DB_con(); 
 
 

$qid = isset($_GET['qid']) ? $_GET['qid'] : '';   // รับค่าจากคลิกลิ้งค์ 

if  ($qid != "") {  //echo "qid1"."<br>";
    $qid = $qid;
    $sql_toppic = "SELECT * FROM test_temp WHERE username1 = '$sUser' and question_id = '$qid'";
    //echo "sql_toppic = ".$sql_toppic."<br>";
} 
$query_toppic = mysqli_query($con, $sql_toppic);
$rs = mysqli_fetch_assoc($query_toppic);  //echo "Frist record  question_id = ".$rs['question_id'];
 
$qname = $db_con->s1f('question','question','question_id',$qid);
$qphoto = $db_con->s1f('photo','question','question_id',$qid);
//$ans_self = $rs['answer_self']; //echo "<br>answer_id ที่เราตอบ = ".$ans_self; //เอาไว้เช็ค radio หลังจากตอบคำถามไปแล้ว
////เอาไว้แสดงเวลาทดสอบโปรแกรม ลบออกทีหลัง
$show_answer = $db_con->s2f('answer','answer','question_id',$qid,'result','1');  //เอาไว้แสดงเวลาทดสอบโปรแกรม ลบออกทีหลัง
$correct_ans = $db_con->s2f('answer_id','answer','question_id',$qid,'result','1');  // คำตอบที่ถูกต้อง จากฐาน
//echo "<br>answer_id ที่โปรแกรมตอบ = ".$correct_ans; //เอาไว้แสดงเวลาทดสอบโปรแกรม ลบออกทีหลัง
//------------------------------------------

 
?> 
<div class="formTest">
<div class="formTest__inner">

    <div class="formTest__content">
        
         
        <div class="formTest__pageNation"> </div>

        <form name="form1" method="post" action="test_form.php" class="form_question">
         <input type="text" name="qid2" value="<?php echo $qid; ?>" hidden> 
         
                <div class="question">
                  <?php 
                    echo "<h4>".$qname."?</h4><h6></h6>"; // คำถาม 
                    echo "<span style='color: #F50206'>The answer is ==> ".$show_answer."</span><br><br><br>";
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
                         
                            echo "<input type='radio' name='radio' value='$correct_result $answer_id_from_program' >".$loop_ans['answer'];
                         
            
                        if ($anshoto == "")  { echo "";} else {echo "<br><img src='img_trafik_ans/".$anshoto."' width='100'>";} 
                        echo "<br><hr><br>";
                    endwhile; ?>                                        
                </div>

                <div class="btn_svara">
                     
                </div>

             
             
        </form>


         
    </div> 
 
</div>
</div> 

 