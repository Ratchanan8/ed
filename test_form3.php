<?php include_once('header.php'); ?> 
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/style_slide.css">
 
<?php 
if  ($_SESSION['pass_group'] != "ADM") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); 
require_once("pagination_function_test.php");
require_once('include/fun.php'); 
$db_con = new DB_con(); 

$total_toppic = isset($_REQUEST['total_toppic']) ? $_REQUEST['total_toppic'] : '';  
$toppic = isset($_GET['qid']) ? $_GET['qid'] : '';
$sql_toppic = "SELECT * FROM test_temp WHERE username1 = '$sUser' and question_id = '$toppic'";
$query_toppic = mysqli_query($con, $sql_toppic);
$rs = mysqli_fetch_assoc($query_toppic) 
?>
<div class="formTest">
    <div class="formTest__inner">
        <h3>(slide)จำนวนที่จะทดสอบ <?php echo $total_toppic; ?> ข้อ</h3> 
        <div class="carousel clearfix"> 
        <div class="carousel-view clearfix">
        <div class="box">
        <form action="">
            
        <?php echo $rs['question_id']; ?>
        <br><br><br><br><br><br><br><br><br><br><br>
        </form>
        </div>
        </div>
        </div>
        
        <div class="pageNation">
        <?php 
        $results = $con->query("SELECT * FROM test_temp WHERE username1 = '$sUser' LIMIT 0, $total_toppic");
        $i = 1;
        while($row = $results->fetch_assoc()) :
            $qid = $row['question_id'];
            echo "<a href='test_form2.php?total_toppic=$total_toppic&qid=$qid'>".$i."</a>&nbsp;&nbsp;&nbsp;";
            $i++ ;
            
        endwhile;
        ?>
        </div>
   
     

    </div>  

    <div> 
         
    </div>

</div> 
<script src="js/jquery.js"></script>
<script src="js/slick.min.js"></script>
<script>
          $('.carousel-view').slick({
            dots: false,
            infinite: true,
            speed: 2000,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
          });
</script>
<?php //include_once('footer.php') ?>  