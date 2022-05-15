<?php include_once('header.php'); ?> 
<?php 
if  ($_SESSION['pass_group'] != "ADM") { header('location: index.php'); exit();}
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 

require_once('include/db.php'); 
require_once("pagination_function_test.php");
require_once('include/fun.php'); 
$db_con = new DB_con(); 

$total_toppic = isset($_REQUEST['total_toppic']) ? $_REQUEST['total_toppic'] : '';  
?>
<div class="formTest">
    <div class="formTest__inner">
        <h3>จำนวนที่จะทดสอบ <?php echo $total_toppic; ?> ข้อ</h3> 
        <?php 
//$page = isset($_GET['page']) ? $_GET['page'] : ''; 
$item_per_page = 2; //item to display per page
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
    $page_number = 1; //if there's no page number, set it to 1
    }

    $results = $con->query("SELECT COUNT(*) FROM test_temp WHERE username1 = '$sUser'");
    $get_total_rows = $results->fetch_row(); //hold total records in variable
    //break records into pages
    $total_pages = ceil($get_total_rows[0]/$item_per_page);
    
    //position of records
    $page_position = (($page_number-1) * $item_per_page);
    
    //Fetch part of records using SQL LIMIT clause
    $results = $con->query("SELECT * FROM test_temp WHERE username1 = '$sUser' LIMIT $page_position, $item_per_page");
    while($row = $results->fetch_assoc()) :
 

 /*$sql = "SELECT * FROM test_temp WHERE username1 = '$sUser' limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);
 while ($result = mysqli_fetch_assoc($query)) :  */
?>
    <form action="">
            <?php echo $row['question_id']; ?>
    </form>
<?php 
    endwhile;
   // mysqli_close($con);
?>   
    </div>  

    <div> 
        <?php 
          echo paginate_function ( $item_per_page , $page_number , $get_total_rows [ 0 ] , $total_pages ) ;
 
        ?> 
    </div>

</div>
<script src="js/paginate.js"></script>
<?php //include_once('footer.php') ?>  