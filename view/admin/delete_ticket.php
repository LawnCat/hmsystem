<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南后台管理</title>
    <link rel="stylesheet" href="../../css/admin/index.css">
    <link rel="stylesheet" href="../../css/admin/delete_ticket.css">

    <script>
        function check_submit() {
            var account = document.getElementsByClassName("account_input")[0].value;
            if (account == "") {
                alert("请输入票ID/ID");
                return;
            }
            var form = document.getElementsByClassName("add_ticket_form")[0];
            if (confirm("确定删除吗？")) {
                form.submit();
            }
        }
    </script>
</head>

<body>
    <!-- 主界面 -->
    <div class="body">
        <?php include_once "header.php" ?>
        <!-- menu -->
        <?php
        session_start();
        if (!isset($_SESSION['admin_account'])) {
            echo "<script>alert('您无权访问')</script>";
            header("Location: login.html");
        }
        ?>
        <script src="../../js/user/menu.js"></script>>
        <div class="menu">
            <div class="menu-item" class="color_buy" style="box-shadow: 0 0 15px red;">
                <a href="index.php">
                    <p>购票系统</p>
                </a>
            </div>
            <div class="menu-item" class="color_user">
                <a href="userinfo.php">
                    <p>用户信息</p>
                </a>
            </div>
            <div class="menu-item" class="color_buy_info">
                <a href="shopping.php">
                    <p>订单信息</p>
                </a>
            </div>
            <div id="menu-item-1" class="menu-item" class="color" onclick="search()">
                <a href="#">
                    <p><input id="search_val" name="search" class="search_input" type="search" placeholder="搜索框 回车即可搜索"></p>
                </a>
            </div>
            <div class="menu-item">
                <a href="../../controllers/admin/logout_admin.php">
                    <p onclick="logout()">退出</p>
                </a>
            </div>

        </div>


        <!-- 功能点 -->
        <div class="func">
            <!-- 增加票 -->
            <div class="func-item">
                <a href="add_ticket.php">
                    <p>增加票</p>
                </a>
            </div>

            <!-- 删除票 -->
            <div class="func-item" style="box-shadow: 0 0 15px blue;">
                <a href="delete_ticket.php">
                    <p>删除票</p>
                </a>
            </div>

            <!-- 修改票 -->
            <div class="func-item">
                <a href="index.php">
                    <p>修改票</p>
                </a>
            </div>

            <form action="../../controllers/admin/ticket_delete.php" method="post" class='add_ticket_form'>
                <div class="account">
                    <p>票ID/ID</p>
                    <input name="id" class="account_input" type="text" placeholder="     请输入ID">
                </div>
                <div class="submit" onclick="check_submit()">
                    <p>提交</p>
                </div>
            </form>
        </div>
    </div>
</body>