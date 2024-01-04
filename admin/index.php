<?php
session_start();
error_reporting(0);
include "config/connection.php";

if (isset($_SESSION['level']) && $_SESSION['level'] == 'staff') {
    header('Location: dashboard.php?module=dashboard');
} else {
    header('Location: login.php');
}
?>
