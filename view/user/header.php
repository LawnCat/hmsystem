<!-- 头部部分 -->
<div class="header">
    <div onclick="to_index()" class="logo">
        <img src="../../images/full_logo.png" width="200px" height="190px">
        <h1>郑州工商学院</h1>
    </div>
    <div class="title">
        <h1>只有河南订票系统</h1>
    </div>
    <?php include_once "../../controllers/user/getuserinfo.php"; ?>
    <div class="you">
        欢迎您&nbsp<?php echo $res['name'] ?>
    </div>
</div>