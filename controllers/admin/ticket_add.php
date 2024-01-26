<?php
session_start();
if (!isset($_SESSION['admin_account'])) {
    echo "<script>alert('请先登录');location.href='../../view/admin/login.html'</script>";
}
$title = $_POST['title'];
$date = $_POST['date'];
$count = $_POST['count'];
$price = $_POST['price'];
$info = $_POST['info'];
$title = trim($title);
$date = trim($date);
$count = trim($count);
$price = trim($price);
$info = trim($info);
include_once "../../conn.php";
$sql = "insert into ticket(title,date,count,price,info) values('$title','$date','$count','$price','$info')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('添加成功');location.href='../../view/admin/add_ticket.php'</script>";
} else {
    echo "<script>alert('添加失败');location.href='../../view/admin/add_ticket.php'</script>";
}
