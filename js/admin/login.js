function check_login() {
    // 初步检验
    var username = document.getElementsByClassName("account_input")[0].value;
    var password = document.getElementsByClassName("password_input")[0].value;
    var form = document.getElementById("login_form");
    if (username == "") {
        alert("请输入用户名");
        return false;
    }
    if (password == "") {
        alert("请输入密码");
        return false;
    }
    form.submit()
}