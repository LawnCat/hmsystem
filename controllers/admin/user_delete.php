<?php
session_start();
if (!isset($_SESSION['admin_account'])) {
    echo "<script>alert('请先登录');location.href='../../view/admin/login.html'</script>";
}
$user_id = $_POST['id'];
if ($_GET['id']) {
    $user_id = $_GET['id'];
}
include_once "../../conn.php";

if (isExist($conn, $user_id)) {
    delete($user_id, $conn);
} else {
    echo "<script>alert('不存在该用户');location.href='../../view/admin/delete_user.php'</script>";
}
function delete($user_id, $conn)
{
    $sql = "delete from user where id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('删除成功');location.href='../../view/admin/delete_user.php'</script>";
    } else {
        echo "<script>alert('删除失败');location.href='../../view/admin/delete_user.php'</script>";
    }
}

function isExist($conn, $id)
{
    $sql = "select * from user where id='$id'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
