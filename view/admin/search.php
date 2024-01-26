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
        <?php include_once "menu.php" ?>

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
            <tr>
                <td>1</td>
                <td>Row:1 Cell:1</td>
                <td>Row:1 Cell:2</td>
                <td>Row:1 Cell:3</td>
                <td>Row:1 Cell:4</td>
                <td>Row:1 Cell:5</td>
                <td>Row:1 Cell:6</td>
                <td>Row:1 Cell:7</td>
            </tr>


        </table>



    </div>
</body>