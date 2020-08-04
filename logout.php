<?php
session_start();
$_SESSION = array();
session_destroy();

header('Location:index'); //redirect to preferred page after unset the session
exit();
?>
