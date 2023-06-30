<?php
session_start();
if (isset($_SESSION['user_username'])){
echo "Welcome".$_SESSION['user_username'];
echo "<br>";
echo "And your password is".$_SESSION['password'];
echo "<br>";
echo "And your password is".$_SESSION['email'];
}else{
    echo "Please login again to continue"; 
}


?>