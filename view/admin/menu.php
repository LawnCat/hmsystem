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