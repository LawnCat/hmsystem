<?php
session_start();
session_unset();
session_destroy();
echo "<script> 
alert('退出成功'); 
window.location.href='../../index.html';

</script>";
