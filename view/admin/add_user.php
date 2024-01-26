<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南后台管理</title>
    <link rel="stylesheet" href="../../css/admin/index.css">
    <link rel="stylesheet" href="../../css/admin/add_user.css">
    <script src="../../js/admin/add_user.js"></script>
    <script>
        function check_submit() {
            var account = document.getElementsByClassName("account_input")[0].value;
            var name = document.getElementsByClassName("account_input")[1].value;
            var sex = document.getElementsByClassName("account_input")[2].value;
            var age = document.getElementsByClassName("account_input")[3].value;
            var bank = document.getElementsByClassName("account_input")[4].value;
            var password = document.getElementsByClassName("account_input")[5].value;
            if (account == "" || name == "" || sex == "" || age == "" || bank == "" || password == "") {
                alert("请填写完整信息");
            } else {
                var form = document.getElementsByClassName("add_ticket_form")[0];
                if (confirm("确定添加吗？")) {
                    form.submit();
                }
            }
        }
    </script>
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
            <div class="menu-item" class="color_buy">
                <a href="index.php">
                    <p>购票系统</p>
                </a>
            </div>
            <div class="menu-item" class="color_user" style="box-shadow: 0 0 15px red;">
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
                <a href="add_user.php">
                    <p>添加用户</p>
                </a>
            </div>

            <!-- 删除票 -->
            <div class="func-item">
                <a href="delete_user.php">
                    <p>删除用户</p>
                </a>
            </div>

            <!-- 修改票 -->
            <div class="func-item">
                <a href="modify_user.php">
                    <p>修改用户信息</p>
                </a>
            </div>

            <form action="../../controllers/admin/user_add.php" method="post" class='add_ticket_form'>
                <!-- 增加票 -->
                <div class="account">
                    <p>账号/account</p>
                    <input name="account" class="account_input" type="text" placeholder="     请输入账号">
                </div>
                <div class="account">
                    <p>姓名/name</p>
                    <input name="name" class="account_input" type="text " placeholder="     请输入姓名">

                </div>
                <div class="account">
                    <p>性别/sex</p>
                    <input name="sex" class="account_input" type="text" placeholder="     请输入性别">
                </div>
                <div class="account">
                    <p>年龄/age</p>
                    <input name="age" class="account_input" type="text" placeholder="     请输入年龄">
                </div>
                <div id="account_info" class="account">
                    <p>钱包/bank</p>
                    <input name="bank" id="info" class="account_input" type="text" placeholder="     请输入余额">
                </div>
                <div id="password" class="account">
                    <p>密码/password</p>
                    <input name="password" class="account_input" type="text" placeholder="     请输入密码">
                </div>
                <div class="submit" onclick="check_submit()">
                    <p>提交</p>
                </div>
            </form>
        </div>
    </div>
</body>