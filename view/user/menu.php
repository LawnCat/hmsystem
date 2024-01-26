<?php
session_start();
if (!isset($_SESSION['account'])) {
    echo "<script>alert('您无权访问')</script>";
    header("Location: ../../login.html");
}
?>
<?php include_once "../../controllers/user/getuserinfo.php"; ?>
<script src="../../js/user/menu.js"></script>>
<div class="menu">
    <div class="menu-item">
        <a href="index.php">
            <p>购票系统</p>
        </a>
    </div>
    <div class="menu-item">
        <a href="userinfo.php">
            <p>个人信息</p>
        </a>
    </div>
    <div class="menu-item">
        <a href="shopping.php">
            <p>个人订单</p>
        </a>
    </div>
    <div id="menu-item-1" class="menu-item">
        <a href="#">
            <p>您的余额所剩：<?php echo $res['money'] ?>元</p>
            <?php
            // echo "<p>100元</p>"
            ?>
        </a>
    </div>
    <div class="menu-item">
        <a href="#">
            <p onclick="logout()">退出</p>
        </a>
    </div>
</div>