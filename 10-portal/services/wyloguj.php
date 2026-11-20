<?php
unset($_SESSION['user']);
unset($_SESSION['uid']);
setcookie('uid', '', time() - 3600, '/');
session_destroy();
header('Location: index.php?strona=glowna');
exit;
