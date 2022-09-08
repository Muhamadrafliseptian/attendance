<?php
session_start();


if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);

    echo "<script>alert('Berhasil Logout');</script>";
    echo "<script>location='login.php';</script>";
    exit;
}
