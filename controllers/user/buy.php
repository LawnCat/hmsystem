<?php
session_start();
if (!isset($_SESSION['account'])) {
    echo "<script>alert('您无权访问')</script>";
    header("Location: ../../login.html");
}
// echo $id;
include "../../conn.php";
// 票的id
$ticket_id = $_GET['id'];
// 用户的account
$account = $_SESSION['account'];
// 票的价钱
$price = $_GET['price'];

$sql_get_id = "select id from user where account='$account'";
$result = mysqli_query($conn, $sql_get_id);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$user_id = $row[0]['id'];
$user_id = intval($user_id);


if (user_money_delete($conn, $price, $user_id)) {
    if (ticket_delete_one($conn, $ticket_id)) {
        if (insert_ticket_user($conn, $ticket_id, $user_id)) {
            echo "<script>
            alert('购买成功');
            window.location.href='../../view/user/index.php';
            </script>";
        }
    }
}



// 先让ticket表中票的数量减一
function ticket_delete_one($conn, $ticket_id)
{
    // 使用这个flag作为标记，如果有一个操作失败，就让flag为false
    $flag = false;
    // 先判断票的数量是否足够
    $sql = "select count from ticket where id=$ticket_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $count = $row[0]['count'];
    if ($count <= 0) {
        echo "<script>alert('票已售完')</script>";
        return false;
    }
    $sql = "update ticket set count=count-1 where id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ticket_id);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_affected_rows($stmt) <= 0) {
        $flag = false;
    } else {
        $flag = true;
    }
    mysqli_stmt_close($stmt);
    return $flag;
}
// 再让ticket_user表中插入订单
function insert_ticket_user($conn, $ticket_id, $user_id)
{
    $flag = false;
    $current_time = date("Y-m-d H:i:s");
    $sql = "insert into ticket_user(ticket_id,user_id,time) values(?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iis", $ticket_id, $user_id, $current_time);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_affected_rows($stmt) <= 0) {
        $flag = false;
    } else {
        $flag = true;
    }
    return $flag;
    mysqli_stmt_close($stmt);
}
// 最后让user表中的money减去票价
function user_money_delete($conn, $price, $user_id)
{
    // 先判断用户的余额是否足够
    $sql = "select money from user where id=$user_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $money = $row[0]['money'];
    if ($money < $price) {
        echo "<script>alert('余额不足')</script>";
        return false;
    }
    $flag = false;
    $sql = "update user set money=money-? where id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ds", $price, $user_id);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_affected_rows($stmt) <= 0) {
        $flag = false;
    } else {
        $flag = true;
    }
    return $flag;
    mysqli_stmt_close($stmt);
}
