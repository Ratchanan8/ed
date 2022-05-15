<?php 
session_start();
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
$sPg = isset($_SESSION['pass_group']) ? $_SESSION['pass_group'] : ''; 
if ($sPg != "ADM"){ header('location: index.php'); exit();} 

require_once('include/db.php'); 

$submit_mode = isset($_POST['submit_mode']) ? $_POST['submit_mode'] : ''; 
$question_id = isset($_POST['question_id']) ? $_POST['question_id'] : ''; 
$answer_id = isset($_POST['answer_id']) ? $_POST['answer_id'] : ''; 
$answer = isset($_POST['answer']) ? $_POST['answer'] : ''; 
//$result =  !isset($_POST['result']) ? 0 : $_POST['result'] ;
$result = empty($_POST['result']) ? "0" : $_POST['result'];
$photo = isset($_POST['photo']) ? $_POST['photo'] : ''; 
 
$path="img_trafik_ans/";

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
            // กรณี edit กับ del เท่านั้นทำตรงนี้
          //  unlink($path.$photo); // ลบภาพ
           // echo "<br>ภาพที่จะลบ ".$path.$photo;} 
        
        
    }
}  
//-----------add----------------------
if($submit_mode == "add")  {
    if ($upload != "")  {
        $photo = $newname; 
        move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy);
    } else {$photo = "";}
     
    $sql = "INSERT INTO answer (question_id, answer, result, photo) VALUES ('$question_id', '$answer', '$result', '$photo');";
    //echo "<br>sql = ".$sql;
 
    if ( $con->query($sql)) {
        echo "<script>alert('Save Successful!');</script>";
        header("Location:q_a_form.php?mode=add&id=$question_id");
      //  echo "<script>window.location.href='q_a_form.php?mode=add&id=$question_id'</script>";
        $con->close(); 
    };
//-----------edit----------------------
} elseif ($submit_mode == "edit")  {
    if (($upload != "") and ($photo == "")) {
        $photo = $newname;
        move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy); // เพิ่มภาพใหม่
    } elseif (($upload != "") and ($photo != "" )) {
         unlink($path.$photo); // ลบภาพเก่า
         $photo = $newname;
         move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy); // เพิ่มภาพใหม่
    } elseif (($upload == "") and ($photo != "" )) {
        $photo = $photo;
    }

        $sql = "UPDATE answer SET answer = '$answer', result = '$result', photo = '$photo' WHERE question_id = '$question_id' and answer_id = '$answer_id';";  //echo $sql;
        //echo "<br> sql = ".$sql;
        if ( $con->query($sql)) {
            echo "<script>alert('Edit Successful!');</script>";
            echo "<script>window.location.href='q_a_form.php?mode=add&id=$question_id'</script>";
            $con->close(); 
        };
 
//-----------del----------------------
} elseif ($submit_mode == "del") {
    unlink($path.$photo); // ลบภาพ
    $sql = "DELETE FROM answer WHERE question_id = '$question_id' and answer_id = '$answer_id' ;";
 
    if ( $con->query($sql)) {
        echo "<script>alert('Delete Successful!');</script>";
        echo "<script>window.location.href='q_a_form.php?mode=add&id=$question_id'</script>";
        $con->close();
    };

} elseif ($submit_mode == "cancel") { 
    header("Location:question_form.php?mode=edit&id=$question_id");
     
}
?>