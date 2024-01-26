<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南后台管理</title>
    <link rel="stylesheet" href="../../css/admin/index.css">
    <script src="../../js/admin/index.js"></script>
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

</head>

<body>
    <!-- 主界面 -->
    <div class="body">
        <?php include_once "header.php" ?>
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
            <div class="func-item">
                <a href="delete_ticket.php">
                    <p>删除票</p>
                </a>
            </div>

            <!-- 修改票 -->
            <div class="func-item">
                <a href="modify_ticket.php">
                    <p>修改票</p>
                </a>
            </div>
        </div>
        <table id="tfhover" class="tftable" border="1">
            <tr>
                <th>ID</th>
                <th>标题</th>
                <th>时间</th>
                <th>描述</th>
                <th>所剩数量</th>
                <th>票价</th>
                <th>修改</th>
                <th>删除</th>
            </tr>

            <?php include_once "../../conn.php";
            $sql = "select * from ticket";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                // print_r($row);
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['info'] . "</td>";
                echo "<td>" . $row['count'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td><a onclick='modify_data(" . $row['id'] . ")' class='table_a'>修改</a></td>";
                echo "<td><a onclick='delete_data(" . $row['id'] . ")' class='table_a'>删除</a></td>";
                // echo "<td><a onclick='buy()' class='table_a' href='../../controllers/user/buy.php?id=" . $row['id'] . "'>购买</a></td>";
                echo "</tr>";
            }
            ?>

        </table>



    </div>
</body>