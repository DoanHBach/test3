<?php
session_start();

// Reset trạng thái login
$_SESSION["IsLogin"] = false;
header("Location: login.html");
?>
