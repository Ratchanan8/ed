<?php 
session_start();
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
$sPg = isset($_SESSION['pass_group']) ? $_SESSION['pass_group'] : ''; 
if ($sPg != "ADM"){ header('location: index.php'); exit();} 

require_once('include/db.php');  
//echo "username1 = ".$_POST[username]."<br>"; // แบบนี้ไม่ควร มันจะ error ในอนาคต
 
//echo '<pre>'; print_r($_FILES); // เป็นarrayมาจากชื่อ name="upload"
//echo '<pre>';
//if ($_FILES['img_file']['name'] !== "")  {echo "= ".$_FILES['img_file']['name'];} else {echo "No photo";}
$submit_mode = isset($_POST['submit_mode']) ? $_POST['submit_mode'] : ''; 
$question_id = $_POST['question_id']; 
$question_group =  $_POST['question_group'];
$question = $_POST['question'];
$url_ref = $_POST['url_ref']; 
$photo = $_POST['photo'];  //echo "<br>ค่าของภาพ = ".$photo."<br>";
$path="img_trafik/";
//เกี่ยวกับภาพ และชื่อภาพใหม่ 
$upload =  $_FILES['img_file']['name'];   //echo "<br>file name = ".$upload."<br>"; // ชื่อภาพ.นามสกุล ล้วนๆ
if ($upload != "")  {
    // ถ้ามีการเลือกภาพ ให้สร้างชื่อภาพใหม่  
    $date1 = date("Ymd_His");
   //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand()); // แค่แลนดอมเฉยๆ 1010714838
    $typefile = strrchr($_FILES['img_file']['name'],"."); //.เฉพาะนามสกุล
    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpeg' || $typefile  =='.jpg' || $typefile  =='.png'){
        //โฟลเดอร์ที่เก็บไฟล์
        //$path="img_trafik/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = $numrand.$date1.$typefile;
        $path_copy=$path.$newname;
        //echo "path_copy = ".$path_copy;
    
        //คัดลอกไฟล์ไปยังโฟลเดอร์  แล้วค่อย เพิ่ม อับเดท ลบข้อมูลต่อไป
       
        //move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy); 
        //if ($photo !== "") {
        //    unlink($path.$photo); // ลบภาพ
        //    echo "<br>ภาพที่จะลบ ".$path.$photo;} 
        
        
    }
}  
 
if($submit_mode == "add")  {
     //echo "add"."<br>";
    if ($upload != "") {
        $photo = $newname;
        move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy);
    } else {$photo = "";}
     
    $sql = "INSERT INTO question (question_group, question, url_ref, photo) VALUES ('$question_group', '$question', '$url_ref', '$photo');";
     //echo $sql;
    if ( $con->query($sql)) {
        echo "<script>alert('Save Successful!');</script>";
        echo "<script>window.location.href='question_list.php'</script>";
        $con->close(); 
    };
 
} elseif ($submit_mode == "edit")  {
    //echo "edit";
    if (($_FILES['img_file']['name'] !== "") and ($photo !== ""))  {
        unlink($path.$photo); // ลบภาพ
        echo "<br>ลบภาพเก่า ".$path.$photo;
        move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy);
        $photo = $newname; 
    } elseif (($_FILES['img_file']['name'] !== "") and ($photo == "")) {
        move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy);
        $photo = $newname;
    } elseif ($_FILES['img_file']['name'] == "") {
        $photo = $photo;
    }
        $sql = "UPDATE question SET question_group = '$question_group', question = '$question', url_ref = '$url_ref', photo = '$photo' WHERE question_id = '$question_id';";  //echo $sql;
        //echo "<br> sql = ".$sql;
        if ( $con->query($sql)) {
            echo "<script>alert('Edit Successful!');</script>";
            echo "<script>window.location.href='question_list.php'</script>";
            $con->close(); 
        };

      
} elseif ($submit_mode == "add_ans")  { 
    //echo "add ans";
    header("Location:q_a_form.php?mode=add&id=$question_id");

} elseif ($submit_mode == "del") { 
    unlink($path.$photo); // ลบภาพ 
    $sql = "DELETE FROM question WHERE question_id = '$question_id';";
    if ( $con->query($sql)) {
        // delete photo in sub    
        $sub_path="img_trafik_ans/";     
        $sql_sel_photo = $con->query("SELECT * FROM answer WHERE question_id = '$question_id'");
            while($rs_sel_photo = $sql_sel_photo->fetch_assoc()) :
                $sub_photo = $rs_sel_photo['photo'];
                unlink($sub_path.$sub_photo); // ลบภาพ
            endwhile;
        
        $del_sub = $con->query("DELETE FROM answer WHERE question_id = '$question_id'");
         
        
    echo "<script>alert('Delete Successful!');</script>";
    echo "<script>window.location.href='question_list.php'</script>";
    $con->close();
    };

} else {
    header('location: question_list.php');
   
}
 ?>

 