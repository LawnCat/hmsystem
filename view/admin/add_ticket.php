<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南后台管理</title>
    <link rel="stylesheet" href="../../css/admin/index.css">
    <link rel="stylesheet" href="../../css/admin/add_ticket.css">
    <script src="../../js/admin/add_ticket.js"></script>
</head>

<body>
    <!-- 主界面 -->
    <div class="body">
        <?php include_once "header.php" ?>

        <!-- menu.php -->
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
            <div class="func-item" style="box-shadow: 0 0 15px blue;">
                <a href="add_ticket.php">
                    <p>增加票</p>
                </a>
            </div>

            <!-- 删除票 -->
            <div class="func-item">
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

            <form action="../../controllers/admin/ticket_add.php" method="post" class='add_ticket_form'>
                <!-- 增加票 -->
                <div class="account">
                    <p>标题/title</p>
                    <input name="title" class="account_input" type="text" placeholder="     请输入标题">
                </div>
                <div class="account">
                    <p>时间/date</p>
                    <input name="date" class="account_input" type="date" placeholder="     请输入时间">

                </div>
                <div class="account">
                    <p>数量/count</p>
                    <input name="count" class="account_input" type="text" placeholder="     请输入数量">
                </div>
                <div class="account">
                    <p>价格/price</p>
                    <input name="price" class="account_input" type="text" placeholder="     请输入价格">
                </div>
                <div id="account_info" class="account">
                    <p>描述/info</p>
                    <input name="info" id="info" class="account_input" type="text" placeholder="     请输入描述">
                </div>
                <div class="submit" onclick="check_submit()">
                    <p>提交</p>
                </div>
            </form>
        </div>
    </div>
</body>