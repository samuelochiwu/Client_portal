<?php
session_start();
//echo $_SESSION['userid'];
if(!isset($_SESSION['userid'])) {
    header("Location: index");
    exit;
}
?>