<?php
session_start();
unset($_SESSION['user']);
echo "<script>location='/';</script>";
?>