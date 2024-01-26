<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>只有河南订票系统</title>
    <link rel="stylesheet" href="../../css/user/index.css">
    <link rel="stylesheet" href="../../css/user/userinfo.css">
    <script src="../../js/user/index.js"></script>
    <!-- <script type="text/javascript">
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
    </script> -->

</head>

<body>
    <!-- 主界面 -->
    <div class="body">
        <?php include_once "header.php" ?>
        <?php include_once "menu.php" ?>
        <?php include_once "../../controllers/user/getuserinfo.php" ?>
        <!-- 个人信息 -->
        <div class="userinfo">
            <table id="tfhover" frame=void class="tftable_userinfo" border="0">
                <tr>
                    <th colspan="2">个人信息</th>
                </tr>
                <tr>
                    <td class="tftable_userinfo_td1">姓名：</td>
                    <td class="tftable_userinfo_td2"><?php echo $res['name']; ?></td>
                </tr>
                <tr>
                    <td class="tftable_userinfo_td1">账号：</td>
                    <td class="tftable_userinfo_td2"><?php echo $res['account']; ?></td>
                </tr>
                <tr>
                    <td class="tftable_userinfo_td1">性别：</td>
                    <td class="tftable_userinfo_td2"><?php echo $res['sex'] ?></td>
                </tr>
                <tr>
                    <td class="tftable_userinfo_td1">年龄：</td>
                    <td class="tftable_userinfo_td2"><?php echo $res['age']; ?>岁</td>
                </tr>
                <tr>
                    <td class="tftable_userinfo_td1">余额：</td>
                    <td class="tftable_userinfo_td2"><?php echo $res['money'] ?>元</td>
                </tr>
            </table>

        </div>
    </div>
</body>