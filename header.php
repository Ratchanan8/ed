<?php require_once('include/db.php'); ?> 
<?php session_start();
$sUser = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
$sPg = isset($_SESSION['pass_group']) ? $_SESSION['pass_group'] : ''; 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ED</title>
    
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@300;400;600;800&display=swap" rel="stylesheet">

</head>
<body> 
<div class="container">
    <header class="header">    

        <div class="header__inner">

                <!-- Logo -->
                <div class="header__logo">
                    <!-- <a href="index.php"><img src="images/logo.png" alt=""></a> -->
                    <a href="index.php"><h1>ED</h1></a>
                </div>

                <!-- user section_start -->
                <div class="header__showUser">
                    <?php             
 
                    
                    if ($sUser != "") {
                    
                    echo "<img src='images/icon_user2.png'> &nbsp;&nbsp;".$sUser;
                     } else {
                        echo "";
                     } ?>
                </div>

                <!-- Menu -->
                <div class="menu">
                    <input type="checkbox" id="menu">
                    <label for="menu"></label>
                    <div class="menu__content">
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="about.php">ABOUT PROGRAM</a></li>
                            <li><a href="contact.php">CONTACT</a></li>
                            
                            <?php if ($sPg == "USE") {?>
                                <li> -------------------</li>
                                <li><a href="test_sel.php">TEST PROGRAM</a></li>
                                <li><a href="logout.php">LOG OUT</a></li>   
                            <?php } elseif ($sPg == "ADM") { ?>
                                <li> -------------------</li>
                                <li><a href="user_list.php">USER LIST</a></li>
                                <li><a href="question_list.php">QUESTIONS</a></li>
                                <li><a href="test_sel.php">TEST PROGRAM</a></li>
                                <li><a href="logout.php">SIGN OUT</a></li>
                            <?php } else { ?>
                                <li><a href="regis.php">SIGN UP</a></li>
                                <li><a href="login.php">SIGN IN</a></li> 
                            <?php } ?>
                         </ul>
                     </div>
                </div>
            
        </div>
    </header>