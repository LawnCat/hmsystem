<?php
session_start();
if (!isset($_SESSION['account'])) {
    echo "<script>alert('您无权访问')</script>";
    header("Location: ../../login.html");
}
include_once "../../conn.php";
$account = $_SESSION['account'];
$sql = 'select * from user where account = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $account);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo "<script> alert($account.'不存在');
    location.href='../../login.html';
    </script>";
}
// 打印信息
$res = $result->fetch_assoc();
