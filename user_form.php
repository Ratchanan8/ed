<?php include_once('header.php') ?> 
<?php 
 
if ($_SESSION['pass_group'] != "ADM"){ header('location: index.php'); exit();}
require_once('include/db.php');  

$mode = isset($_GET['mode']) ? $_GET['mode'] : ''; //echo "mode = ".$mode ;
$getId = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM users WHERE id = '$getId' "; //echo $sql;
$results = $con->query($sql); 
$row = $results->fetch_assoc();
$id = isset($row['id']) ? $row['id'] : ''; 
$username1 = $row['username1'];
?>
 
<div class="uselistf">  
    <div class="uselistf__inner">
        <h3>User</h3>
        <hr>
        <form name="form1" method="post" action="user_act.php">
            <table class="uselist_table"> 
                <tr><td>Username :</td><td> </td><td><input type="text" name="username1" value="<?php echo $username1; ?>" ><input type="text" name="id" value="<?php echo $id; ?>" hidden ></td></tr>
                <tr><td>Full name :</td><td></td><td><input type="text" name="name1" value="<?php echo $row['name1']; ?>"></td></tr>
                <tr><td>Email :</td><td></td><td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td></tr>
                <tr><td>Group :</td><td></td><td><select name="pass_group">
                                                <option value="<?php echo $row['pass_group']; ?>" selected="selected"><?php echo $row['pass_group']; ?></option>
                                                <option value="USE">USE</option>
                                                <option value="ADM">ADM</option>
                                                </select></td></tr>
                <tr><td>Status :</td><td></td><td><select name="status1">
                                                <option value="<?php echo $row['status1']; ?>" selected="selected"><?php echo $row['status1']; ?></option>
                                                <option value="1">1 : Use</option>
                                                <option value="0">2 : Un use</option>
                                                </select></td></tr>
                <tr><td colspan="5"><center><div class="btn_mode">

<?php if ($_GET['mode'] =="add") { ?>
<input type="submit" value="add" name="submit_mode" class="btn" style="background-image:url(images/btn-save.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;" />
<input type="submit" value="cancel" name="submit_mode" style="background-image:url(images/btn-cancel.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
 
<?php } elseif ($_GET['mode'] =="edit") { ?>
<input type="submit" value="edit" name="submit_mode" style="background-image:url(images/btn-edit.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<input type="submit" value="cancel" name="submit_mode" style="background-image:url(images/btn-cancel.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>

<?php } elseif ($_GET['mode'] =="del") { ?>
<input type="submit" value="del" name="submit_mode" style="background-image:url(images/btn-del.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<input type="submit" value="cancel" name="submit_mode" style="background-image:url(images/btn-cancel.png); border:none;   
 width:100px;height:55px; color:transparent; box-shadow: none;"/>
<?php } ?>    

                </div></center></td></tr>
                  
            </table>
             
           
        </form>

         
      

    </div><!-- uselist -->
</div><!-- uselist__inner --> 
<?php //    } } ?>
<?php //include_once('footer.php') ?>  