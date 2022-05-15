<?php include_once('header.php'); ?> 
<?php 
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
$sPg = isset($_SESSION['pass_group']) ? $_SESSION['pass_group'] : ''; 
if ($sPg != "ADM"){ header('location: index.php'); exit();} 

require_once('include/db.php'); 
require_once('include/fun.php'); 
$db_con = new DB_con();  

$mode = isset($_GET['mode']) ? $_GET['mode'] : ''; 
$question_id = isset($_GET['id']) ? $_GET['id'] : ''; 
$answer_id = isset($_GET['id2']) ? $_GET['id2'] : ''; 

//if ($mode == "add") { $sql = "SELECT * FROM `answer` WHERE question_id = '$question_id'" ;}
if (($mode == "edit") or ($mode == "del")){
    $sql = "SELECT * FROM `answer` WHERE question_id = '$question_id' and answer_id = '$answer_id' ;";
    //echo "sql = ".$sql;
    $results = $con->query($sql);
    if ($results->num_rows > 0) :
        $row = $results->fetch_assoc();
        $row_answer_id = isset($row['answer_id']) ? $row['answer_id'] : '';
        $row_answer = isset($row['answer']) ? $row['answer'] : '';
        $row_photo = isset($row['photo']) ? $row['photo'] : '';
        $row_result = isset($row['result']) ? $row['result'] : '';
        if ($row_result == 1) {$result_text = "Correct";} elseif ($row_result == 0) {$result_text = "Incorrect";} else { $result_text = "no";}
        
    endif;
} 

//elseif (is_null($_GET['id'])) {$sql = "SELECT * FROM `answer` WHERE 1" ; } 
//else { $sql = "SELECT * FROM `answer` WHERE question_id = '$question_id'"; }

  
?>
<div class="uselistf">   
    <div class="uselistf__inner">
        <h5>Question <?php echo $question_id." ==> ".$db_con->s1f('question','question','question_id',$question_id)."?"; ?> </h5>
        <hr>
<div class="two_columns">
    <form name="form1" method="post" action="q_a_act.php" enctype="multipart/form-data" class="form_answer form_label">
                        <input type="text" name="question_id" value="<?php echo $question_id; ?>" hidden >
                        <input type="text" name="answer_id" value="<?php echo $answer_id; ?>" hidden >
                Answer: <input type="text" name="answer" size="52" value="<?php if (isset($row_answer) ) {echo $row_answer = $row_answer;} else { echo $row_answer = "";} ?>" required>
                Result: <select name="result">
                        <option value="<?php if (isset($row_result) ) {echo $row_result = $row_result;} else { echo $row_result = "";} ?>" selected="selected"><?php echo $row_result;?></option> 
                        <option value="1">1 : Correct</option> 
                        <option value="0">0 : Incorrect</option>
                        </select> 
                Upload photo: <input type="file" name="img_file">
                              <input type="text" name="photo" value="<?php if (isset($row_photo) ) {echo $row_photo = $row_photo;} else { echo $row_photo = "";} ?>" hidden>
 

                
        <div class="mode_answer">
                    <?php if ($mode =="add" or $mode == "") { ?>
        <button type="submit" name="submit_mode" value="add">SAVE</button>&nbsp;&nbsp;
        <button type="submit" name="submit_mode" value="cancel">CANCEL</button>
        
        <?php } elseif ($mode =="edit") { ?>
        <button type="submit" name="submit_mode" value="edit">EDIT</button>&nbsp;&nbsp;
        <button type="submit" name="submit_mode" value="cancel">CANCEL</button>

        <?php } elseif ($mode =="del") { ?>
        <button type="submit" name="submit_mode" value="del">DELETE</button>&nbsp;&nbsp;
        <button type="submit" name="submit_mode" value="cancel">CANCEL</button>
        <?php } ?>  
        </div><!--    mode_answer    -->
    </form> 

    <div class="show_photo"> 
        <h5><?php if (empty($row_photo)) { echo "No photo";} else { echo "<img src='img_trafik_ans/".$row_photo."'>";} ?></h5>
    </div>
</div>
        <div class="answers__list">
            <table class="userlist_table">
                <tr class="head-toppic"><td>id</td><td>Answer</td><td>Result</td><td><a href="q_a_form.php?mode=add&id=<?php echo $question_id;?>"><img class="icon_mode" src="images/icon_add.png" alt=""></a></td></tr>
<?php 
$sql_list = "SELECT * FROM `answer` WHERE `question_id` = '$question_id' "; //echo $sql_list;
$res_list = $con->query($sql_list);
if ($res_list->num_rows > 0) :
    while($row_list = $res_list->fetch_assoc()):


//$res_list = $con->query($sql_list);
//if($res_list && $res_list->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    //while($row_list = $res_list->fetch_assoc()){
   
 ?>
                <tr><td><?php echo $row_list['answer_id'];?></td><td><?php echo $row_list['answer'];?></td><td><?php echo $row_list['result'];?></td><td class="mode"><a href="q_a_form.php?mode=edit&id=<?php echo $row_list['question_id'];?>&id2=<?php echo $row_list['answer_id'];?>"><img class="icon_mode" src="images/icon_edit.png"></a> <a href="q_a_form.php?mode=del&id=<?php echo $row_list['question_id'];?>&id2=<?php echo $row_list['answer_id'];?>"><img class="icon_mode" src="images/icon_del.png"></a></td></tr>
<?php 
endwhile;
endif; ?>
            </table>
        </div>


    </div><!-- uselistf__inner -->
</div><!-- uselistf --> 
 
  