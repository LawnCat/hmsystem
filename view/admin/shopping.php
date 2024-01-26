<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南后台管理</title>
    <link rel="stylesheet" href="../../css/admin/index.css">

    <!-- Row Highlight Javascript -->
    <script type="text/javascript">
        window.onload = function() {
            var tfrow = document.getElementById('tfhover').rows.length;
            var tbRow = [];
            for (var i = 1; i < tfrow; i++) {
                tbRow[i] = document.getElementById('tfhover').rows[i];
                tbRow[i].onmouseover = function() {
                    this.style.backgroundColor = '#f3f8aa';
                };
                tbRow[i].onmouseout = function() {
                    this.style.backgroundColor = '#ffffff';
                };
            }
        };
    </script>
    <style>
        table.tftable {
            top: 16px;
        }
    </style>
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
            <div class="menu-item" class="color_user">
                <a href="userinfo.php">
                    <p>用户信息</p>
                </a>
            </div>
            <div class="menu-item" class="color_buy_info" style="box-shadow: 0 0 15px red;">
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

        <table id="tfhover" class="tftable" border="1">
            <tr>
                <th>订单ID</th>
                <th>票标题</th>
                <th>游玩时间</th>
                <th>购买者</th>
                <th>下单时间</th>
            </tr>
            <?php
            // 打印数据
            include_once "../../conn.php";
            $sql = 'select * from ticket_user';
            $res = mysqli_query($conn, $sql);
            $res = mysqli_fetch_all($res, MYSQLI_ASSOC);

            foreach ($res as $row) {
                // var_dump($row);
                // 通过ticket_id查询票的标题
                $sql = "select * from ticket where id=" . $row['ticket_id'];
                // var_dump($sql);
                $ticket_res = mysqli_query($conn, $sql);
                $ticket_res = mysqli_fetch_all($ticket_res, MYSQLI_ASSOC);
                // var_dump($ticket_res);
                $ticket_title = $ticket_res[0]['title'];
                $ticket_time = $ticket_res[0]['date'];

                // 通过user_id查询用户的账号
                $sql = "select * from user where id=" . $row['user_id'];
                // var_dump($sql);
                $user_res = mysqli_query($conn, $sql);
                $user_res = mysqli_fetch_all($user_res, MYSQLI_ASSOC);
                // var_dump($user_res);
                $user_name = $user_res[0]['name'];
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $ticket_title . "</td>";
                echo "<td>" . $ticket_time . "</td>";
                echo "<td>" . $user_name . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "</tr>";
            }
            ?>





        </table>



    </div>
</body>