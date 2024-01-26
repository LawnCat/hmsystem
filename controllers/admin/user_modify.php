<?php
session_start();
if (!isset($_SESSION['admin_account'])) {
    echo "<script>alert('请先登录');location.href='../../view/admin/login.html'</script>";
}
$account = $_POST['account'];
$name = $_POST['name'];
$sex = $_POST["sex"];
$age = $_POST["age"];
$bank = $_POST["bank"];
$password = $_POST["password"];
if (strlen($password) !== 32) {
    $password = md5($password);
}
$id = $_POST['user_id'];
include_once "../../conn.php";
$account = trim($account);
$name = trim($name);
$age = trim($age);
$bank = trim($bank);
$password = trim($password);
$id = trim($id);
update($conn, $account, $name, $age, $bank, $password, $id);
// 对user表中的数据进行更新
function update($con, $account, $name, $age, $bank, $password, $id)
{
    $sql = "UPDATE user SET account = '$account', name = '$name', age = '$age', money = '$bank', password = '$password' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) >= 1) {
        echo "<script>alert('修改成功');location.href='../../view/admin/userinfo.php'</script>";
    } else {
        echo "<script>alert('修改失败');location.href='../../view/admin/userinfo.php'</script>";
    }
}
