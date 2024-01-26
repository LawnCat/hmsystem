<?php
session_start();
if (!isset($_SESSION['admin_account'])) {
    echo "<script>alert('请先登录');location.href='../../view/admin/login.html'</script>";
}
$ticket_id = $_POST['id'];
if ($_GET['id']) {
    $ticket_id = $_GET['id'];
}
include_once "../../conn.php";

if (isExist($conn, $ticket_id)) {
    delete($ticket_id, $conn);
} else {
    echo "<script>alert('不存在该票');location.href='../../view/admin/delete_ticket.php'</script>";
}
function delete($ticket_id, $conn)
{
    $sql = "delete from ticket where id='$ticket_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('删除成功');location.href='../../view/admin/delete_ticket.php'</script>";
    } else {
        echo "<script>alert('删除失败');location.href='../../view/admin/delete_ticket.php'</script>";
    }
}



function isExist($conn, $id)
{
    $sql = "select * from ticket where id='$id'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
