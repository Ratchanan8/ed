<?php include_once('header.php') ?> 
<div class="regis">  
    <div class="regis__inner">
        <div class="regis__fream public__fream">
            <form action="regis_act.php" method="post" onSubmit="JavaScript:return fnSubmit();">
                <div class="form_label">Username</div>
                <div><input type="text" name="username" id="username" required></div>
                <div class="form_label">Full name</div>
                <div><input type="text"  name="name1" id="name1" required></div>
                <div class="form_label">E-mail</div>
                <div><input type="text" name="email" id="email" onblur="check_email(this)"></div>
                <div class="form_label">Password</div>
                <div><input type="password" id="password" name="password" required></div>
                <div class="form_label">Re-Password</div>
                <div><input type="password" id="password2" name="password2" required></div> 
                <div><button type="submit" name="submit" value="SIGN UP" >SIGN UP</button> 
                    <!-- <input type="submit" name="submit" value="SIGN UP"  /> --></div>
            </form>

            <div class="iconOnFrame">
                <img src="images/icon_user.png" alt="">
                <h3>REGISTER MEMBER</h3>
            </div>
        
        </div>
        
    </div>
</div>   
<script src="js/check_pass.js.js"></script>
<?php include_once('footer.php') ?>  