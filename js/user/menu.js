
function logout() {
    if (confirm("请确认是否退出？")) {
        location.href = "../../controllers/user/logout.php";
    } else {

    }
}