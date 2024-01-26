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
        <table id="tfhover" class="tftable" border="1">
            <tr>
                <th>标题</th>
                <th>时间</th>
                <th>描述</th>
                <th>状态</th>
            </tr>

            <?php
            include_once "../../conn.php";
            include_once "../../controllers/user/getuserinfo.php";
            $user_id = $res['id'];
            $sql = "select * from ticket_user where user_id='$user_id'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $ticket_id = $row['ticket_id'];
                $sql = "select * from ticket where id='$ticket_id'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_array($result2);
                echo "<tr>";
                echo "<td>" . $row2['title'] . "</td>";
                echo "<td>" . $row2['date'] . "</td>";
                echo "<td>" . $row2['info'] . "</td>";
                echo "<td>" . '已购买' . "</td>";
                echo "</tr>";
            }




            // $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // var_dump($res);
            // $ticket_id = $res[0]['ticket_id'];
            // $sql = "select * from ticket where id='$ticket_id'";
            // $result = mysqli_query($conn, $sql);



            ?>
        </table>

        <!-- 个人订单 -->

    </div>
</body>