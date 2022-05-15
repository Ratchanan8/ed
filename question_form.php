<?php include_once('header.php'); ?> 
<?php 
if ($_SESSION['pass_group'] != "ADM"){ header('location: index.php'); exit();}
require_once('include/db.php');  
$mode = isset($_GET['mode']) ? $_GET['mode'] : ''; 
$id = isset($_GET['id']) ? $_GET['id'] : ''; 

 
$sql = "SELECT * FROM question WHERE question_id = '$id' "; // echo $sql;
$results = $con->query($sql);

if ($results->num_rows > 0) :
$row = $results->fetch_assoc(); //echo "get data = ".$row[question_id];
$row_id = isset($row['question_id']) ? $row['question_id'] : ''; 
$row_qg = isset($row['question_group']) ? $row['question_group'] : ''; 
$row_q = isset($row['question']) ? $row['question'] : ''; 
$row_url_ref = isset($row['url_ref']) ? $row['url_ref'] : ''; 
$row_photo = isset($row['photo']) ? $row['photo'] : ''; 
 

// เอาค่าเล็กๆมาแสดง
$sql_sub = "SELECT * FROM question_group WHERE id = '$row_qg' ";
//echo "sql_sub = ".$sql_sub."<br>";
$res_sub = $con->query($sql_sub);
$rs_sub = $res_sub->fetch_assoc();

$rs_sub_name1 = isset($rs_sub['name1']) ? $rs_sub['name1'] : ''; 
//echo "rs_sub_name1 =".$rs_sub_name1."<br>";
endif;
?>
 
<div class="uselistf">  
    <div class="uselistf__inner">
        <h3>Question</h3>
        <hr>
        <form name="form1" method="post" action="question_act.php" enctype="multipart/form-data">
        <table class="uselist_table"> 
                <tr><td>Question_group :</td><td> </td>
                  <td><select name="question_group" required>
                    <option value="<?php
								   if (isset($row_qg) ) {$row_qg = $row_qg; $rs_sub_name1 = $rs_sub_name1; } else {$row_qg = ""; $rs_sub_name1 = "";}
								   echo $row_qg;?>" selected="selected"><?php echo $row_qg." : ".$rs_sub_name1; ?></option>
                    <?php $sql_sel_g = "SELECT * FROM  question_group  WHERE  id  != '$row_qg'  ";
                                                      $rs_sel = $con->query($sql_sel_g);
                                                      if ($rs_sel->num_rows > 0) :
                                                      while ($row_sel = $rs_sel->fetch_assoc() ) :
                                                       $sel_qg_id = $row_sel['id'] ?? null;
                                                       $sel_qg_name1 = $row_sel['name1'] ?? null;
                                                ?>
                    <option value="<?php echo $sel_qg_id;?>"><?php echo $sel_qg_id." : ".$sel_qg_name1;?></option>
                    <?php 
                                                endwhile;
                                                endif;
                                                ?>
                  </select> 
                  <input type="text" name="question_id" value="<?php echo $id; ?>" hidden ></td>
                  <td rowspan="4" class="q_photo">
                      <?php if (empty($row_photo)) { echo "No photo";} else { echo "<img src='img_trafik/".$row_photo."'>";} ?>
                  </td></tr>
                <tr><td>Question :</td><td></td>
                  <td><input type="text" name="question" size="52" value="<?php if (isset($row_q) ) {echo $row_q = $row_q;} else { echo $row_q = "";} ?>" required></td>
                </tr>
                <tr><td>Url & Referent  :</td><td></td>
                  <td><textarea name="url_ref" rows="5" cols="50"><?php if (isset($row_url_ref) ) {echo $row_url_ref = $row_url_ref;} else { echo $row_url_ref = "";} ?></textarea></td>
                </tr>   
                <tr><td>Upload photo :</td><td></td>
                  <td><input type="file" name="img_file">
                  <input type="text" name="photo" value="<?php if (isset($row_photo) ) {echo $row_photo = $row_photo;} else { echo $row_photo = "";} ?>" hidden ></td>
                </tr>   
                <tr><td colspan="6"><center><div class="btn">

<?php if ($mode =="add") { ?>
<input type="submit" value="add" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-save.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;" />
<input type="submit" value="cancel" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-cancel.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
 
<?php } elseif ($mode =="edit") { ?>
<input type="submit" value="edit" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-edit.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<input type="submit" value="cancel" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-cancel.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<input type="submit" value="add_ans" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-add-answers.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>

<?php } elseif ($mode =="del") { ?>
<input type="submit" value="del" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-del.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<input type="submit" value="cancel" name="submit_mode" class="btn__mode" style="background-image:url(images/btn-cancel.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<?php } ?>    

                </div></center></td></tr>
                  
            </table>
             
           
        </form>

         
      

    </div><!-- uselist__inner -->
</div><!-- uselist --> 
<?php //    } } ?>
<?php //include_once('footer.php') ?>  