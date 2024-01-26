
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
$id = $_POST['ticket_id'];
include_once "../../conn.php";
$sql = "update ticket set title='$title',date='$date',count='$count',price='$price',info='$info' where id='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('修改成功');location.href='../../view/admin/index.php'</script>";
} else {
    echo "<script>alert('修改失败');location.href='../../view/admin/index.php'</script>";
}
