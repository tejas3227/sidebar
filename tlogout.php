<?php
include('config.php');
session_unset();
session_destroy();
header('location:tlogin.php');
?>