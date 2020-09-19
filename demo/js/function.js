function login() {
    var form = document.getElementById('login_form');
    if(form.phone.value == ""){
        alert("请输入手机号");
        form.phone.focus();
        return false;
    }
}


function register() {
    var form = document.getElementById('register_form');
    if(form.reg_phone.value == ""){
        alert("请输入手机号");
        form.reg_phone.focus();
        return false;
    }
    if(form.reg_email.value == ""){
        alert("请输入邮箱");
        form.reg_email.focus();
        return false;
    }
    if(form.reg_username.value == ""){
        alert("请输入用户名");
        form.reg_username.focus();
        return false;
    }
    if(form.reg_password.value == ""){
        alert("请输入密码");
        form.reg_password.focus();
        return false;
    }
    if(form.repassword.value == ""){
        alert("请再次输入密码");
        form.repassword.focus();
        return false;
    }
    if(form.reg_password.value != form.repassword.value){
        alert("两次输入的密码不相同");
        form.repassword.focus();
        return false;
    }
}

function post() {
    var form = document.getElementById('post_form');
    if(form.title.value == ""){
        alert("帖子名称不能为空");
        form.title.focus();
        return false;
    }
    if(form.description.value == ""){
        alert("帖子简介不能为空");
        form.description.focus();
        return false;
    }
    if(form.content.value == ""){
        alert("帖子内容不能为空");
        form.content.focus();
        return false;
    }
}