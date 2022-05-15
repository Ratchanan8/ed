<?php include_once('header.php'); ?> 
<?php 
if ($_SESSION['pass_group'] == "") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); 
require_once('include/fun.php'); 
$db_con = new DB_con(); 

$submit_mode = isset($_POST['submit_mode']) ? $_POST['submit_mode'] : ''; 
$sql_count_tp = $con->query("SELECT COUNT(*) FROM test_temp WHERE username1 = '$sUser'");
$rs_total_toppic = $sql_count_tp->fetch_row(); //hold to
$total_toppic = $rs_total_toppic[0]; // จำนวนข้อทั้งหมด
 
$sql_count_score = $con->query("SELECT COUNT(*) FROM test_temp WHERE username1 = '$sUser' and score = 1");
$rs_total_score = $sql_count_score->fetch_row(); //hold to
$total_score = $rs_total_score[0]; // จำนวนคะแนนที่ทำได้

$var1 = $total_score * 100 ;
$var2 = $var1 / $total_toppic;
 
if  ($var2 == 100) { 
     $star = "<img src='images/star.png'><img src='images/star.png'><img src='images/star.png'><img src='images/star.png'><img src='images/star.png'>";
     $best_trophy = "<img src='images/best_trophy.png'>";
}
elseif  ($var2 == 90) { 
    $star = "<img src='images/star.png'><img src='images/star.png'><img src='images/star.png'><img src='images/star.png'>";
    $best_trophy = "";
}
elseif  ($var2 == 80) { 
    $star = "<img src='images/star.png'><img src='images/star.png'><img src='images/star.png'>";
    $best_trophy = "";
}
elseif  ($var2 == 70) { 
    $star = "<img src='images/star.png'><img src='images/star.png'>";
    $best_trophy = "";
}
elseif  ($var2 == 60) { 
    $star = "<img src='images/star.png'>";
    $best_trophy = "";
}
elseif  ($var2 <= 50) { 
    $star = "";
    $best_trophy = "";
    $text1 = "ท่านควรปรับปรุง";
}
 

?>
 
<div class="formTest">
    <div class="formTest__inner">
        <div class="resutal">
            <h1>ผลการทดสอบ</h1> 
            <hr>
            <h2><?php echo $sUser; ?></h2> <h3>ท่านได้&nbsp;&nbsp;<?php echo $total_score."&nbsp;&nbsp;คะแนน จากทั้งหมด&nbsp;&nbsp;".$total_toppic; ?>&nbsp;&nbsp;ข้อ</h3>
            <?php echo (isset($text1)) ? $text1 : "" ; ?> 
            <div class="star"><?php echo "<br>".$star; ?></div>  
            <?php echo "<br>".$best_trophy; ?>
        </div>  
    </div>  
</div>
<?php include_once('footer.php') ?>  