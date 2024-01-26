<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南订票系统</title>
    <link rel="stylesheet" href="../../css/user/index.css">
    <script src="../../js/user/index.js"></script>
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
        <?php include_once "menu.php" ?>
        <!-- 打印购票信息 -->
        <table id="tfhover" class="tftable" border="1">
            <tr>
                <th>标题</th>
                <th>时间</th>
                <th>描述</th>
                <th>所剩数量</th>
                <th>票价</th>
                <th>操作</th>
            </tr>

            <?php
            include_once "../../conn.php";
            include_once "../../controllers/user/getuserinfo.php";
            $sql = "select * from ticket";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['info'] . "</td>";
                echo "<td>" . $row['count'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td><a  onclick='buy(" . $row['id'] . ',' . $row['price'] . ',' . $row['count'] . ',' . $res['money'] . ")' class='table_a'>购买</a></td>";
                // echo "<td><a onclick='buy()' class='table_a' href='../../controllers/user/buy.php?id=" . $row['id'] . "'>购买</a></td>";

                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>