function check_submit() {
    // alert("11");
    var title = document.getElementsByClassName("account_input")[0].value;
    var date = document.getElementsByClassName("account_input")[1].value;
    var count = document.getElementsByClassName("account_input")[2].value;
    var price = document.getElementsByClassName("account_input")[3].value;
    var form = document.getElementsByClassName("add_ticket_form")[0];
    if (title == "" || date == "" || count == "" || price == "") {
        alert("请填写完整信息");
        return;
    }

    if (confirm("确认是否添加")) {
        form.submit();
    }

}