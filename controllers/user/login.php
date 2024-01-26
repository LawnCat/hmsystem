<?php
session_start();

$account = $_POST['account'];
$password = $_POST['password'];
$password = md5($password);
include_once "../../conn.php";
$stmt = $conn->prepare("SELECT * FROM user WHERE account = ? AND password = ?");
$stmt->bind_param("ss", $account, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1) {
    $_SESSION['account'] = $account;
    echo "<script> alert('登录成功');
    location.href='../../view/user/index.php';
    </script>";
} else {
    echo "<script> alert('登录失败');
    location.href='../../login.html';
    </script>";
}
$stmt->close();
$conn->close();
