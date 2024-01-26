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
$password = md5($password);
$account = trim($account);
$name = trim($name);
$age = trim($age);
$bank = trim($bank);
$password = trim($password);

include_once "../../conn.php";

if (isExist($conn, $account)) {
    echo "<script>alert('该账号已存在');location.href='../../view/admin/add_user.php'</script>";
} else {
    insert_data($conn, $account, $name, $password, $sex, $age, $bank);
}


function insert_data($conn, $account, $name, $password, $sex, $age, $bank)
{
    $sql = "INSERT INTO user (account, name, password, sex, age, money) VALUES ('$account', '$name', '$password', '$sex', '$age', '$bank')";
    $result = mysqli_query($conn, $sql);
    // 输出报错信息
    echo mysqli_error($conn);


    if ($result) {
        echo "<script>alert('添加成功');location.href='../../view/admin/add_user.php'</script>";
    } else {
        echo "<script>alert(mysqli_error($conn));location.href='../../view/admin/add_user.php'</script>";
    }
}

function isExist($conn, $account)
{
    $sql = "select * from user where account='$account'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
