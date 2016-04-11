<?php
   session_start();
   $_SESSION['login'] = "0";
   unset($_SESSION['user']);
   unset($_SESSION['user_id']);
   
   header('Refresh: 2; URL = http://localhost/PHPSpartans/index.php');
?>