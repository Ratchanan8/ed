<?php include_once('header.php') ?> 
<div class="login">  
    <div class="login__inner">
        <div class="login__fream public__fream">
            
            <form name="" action="login_act.php" method="post">
                <div class="form_label">Username</div>
                <div><input type="text"  name="username1" id="username1" placeholder="Username" required></div>
                
                <div class="form_label">Password</div>
                <div><input type="password" id="password1" name="password1" placeholder="Password" required></div>
                
                <div><button type="submit" name="submit" value="SING IN" >SING IN</button></div>
            </form>

            <div class="iconOnFrame">
                <img src="images/icon_login.png" alt="">
                <h3>SING IN</h3>
            </div>
        
        </div>
        
    </div>
</div>   
<script src="js/check_pass.js.js"></script>
<?php //include_once('footer.php') ?>  