function check_register() {
    // 初步检验
    var account = document.getElementsByClassName("account_input")[0].value
    var password = document.getElementsByClassName("password_input")[0].value
    var password2 = document.getElementsByClassName("password_input")[1].value
    var name = document.getElementsByClassName("password_input")[2].value
    var age = document.getElementsByClassName("password_input")[3].value
    var sex = document.getElementsByClassName("password_input")[4].value
    var form = document.getElementById("register_form")
    console.log(account, password, password2, name, age)
    if (account == "" || password == "" || password2 == "" || name == "" || age == "") {
        alert("请填写完整信息")
        return false
    }
    if (password != password2) {
        alert("两次密码不一致")
        return false
    }
    // 二次检验
    var reg = /^[0-9a-zA-Z]+$/
    if (!reg.test(account)) {
        alert("账号只能包含数字和字母")
        return false
    }
    reg = /^[0-9a-zA-Z]{6,16}$/
    if (!reg.test(password)) {
        alert("密码长度应为6-16位")
        return false
    }
    reg = /^[0-9a-zA-Z]{1,10}$/
    if (!reg.test(name)) {
        alert("姓名长度应为1-10位")
        return false
    }
    reg = /^[0-9]{1,3}$/
    if (!reg.test(age)) {
        alert("年龄应为1-3位数字")
        return false
    }
    // 提交表单
    form.submit()
    // form.submit()
}