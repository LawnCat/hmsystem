<?php
session_start();
$account = $_POST['account'];
$password = $_POST['password'];
$account = trim($account);
$password = trim($password);
$password = md5($password);
include_once "../../conn.php";

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM admin WHERE account = ? AND password = ?");
$stmt->bind_param("ss", $account, $password);
$stmt->execute();

// Check if the login is successful
$result = $stmt->get_result();
// $row = $result->fetch_assoc();
// print_r($row);


if ($result->num_rows === 1) {
    // Set session variables
    $_SESSION['admin_account'] = $account;
    // $_SESSION['password'] = $password;

    // Redirect to the user's index page
    echo "<script> alert('登录成功');
    location.href='../../view/admin/index.php';
    </script>";
} else {
    // Handle unsuccessful login
    echo "<script> alert('登录失败');
    location.href='../../view/admin/login.html';
    </script>";
}

$stmt->close();
$conn->close();
