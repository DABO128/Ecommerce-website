<?php
session_start();
session_unset();
session_destroy();
//echo "Variables destroyed";
echo "<script>window.open('../index.php','_self')</script>";
?>