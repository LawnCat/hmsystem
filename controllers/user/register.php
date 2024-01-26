<?php
$name = $_POST['username'];
$account = $_POST['account'];
$password = $_POST['password'];
$age = $_POST['userage'];
$sex = $_POST['usersex'];
$password = md5($password);
$account = trim($account);
$name = trim($name);
$age = trim($age);
$password = trim($password);

include_once "../../conn.php";

if (isExist($conn, $account)) {
    echo "<script>alert('该账号已存在');location.href='../../view/user/register.html'</script>";
} else {
    add_user($conn, $name, $account, $password, $age, $sex);
}

// 添加用户信息
function add_user($conn, $name, $account, $password, $age, $sex)
{
    $sql = "INSERT INTO user (name, account, password, age, sex) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $name, $account, $password, $age, $sex);
    $stmt->execute();
    // 判断是否成功
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('注册成功');window.location.href='../../login.html'</script>";
    } else {
        echo "<script>alert('注册失败');location.href='../../view/user/register.html</script>";
    }
}

// 判断是否存在该账号
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

$stmt->close();
$conn->close();
