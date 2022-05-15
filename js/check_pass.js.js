function fnSubmit()
{   
    if(document.getElementById('username').value == "")
    {
        alert('กรุณากรอกยูสเซอร์เนมค่ะ');
        return false;
    }

    if(document.getElementById('name1').value == "")
    {
        alert('กรุณากรอกชื่อและนามสกุลค่ะ');
        return false;
    }
 
    if(document.getElementById('email').value == "")
    {
        alert('กรุณากรอกอีเมล์ค่ะ');
        return false;
    }


    if(document.getElementById('password').value == "")
    {
        alert('กรุณากรอกรหัสผ่านค่ะ');
        return false;
    }

    if(document.getElementById('password2').value == "")
    {
        alert('กรุณากรอกรหัสผ่านเดิมอีกครั้งค่ะ');
        return false;
    }

   /* if((document.getElementById('password1').value) != (document.getElementById('password2').value))
    {
        alert('รหัสผ่านทั้งสองครั้งค่ะ');
        return false;
    }*/

 
}

function check_email(elm){
    var regex_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
    if(!elm.value.match(regex_email)){
        alert('รูปแบบอีเมล์ไม่ถูกต้องค่ะ ! กรุณากรอกใหม่อีกครั้งค่ะ !!');
    } 
}

