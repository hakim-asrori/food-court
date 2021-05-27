<?php
session_start();
unset($_SESSION['admin']);
echo "<script>location='/';</script>";
?>