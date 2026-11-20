<?php
if ($debug === true) {
    var_dump($_SESSION['lang'] ?? null);
    var_dump($_SESSION['mode'] ?? null);
    var_dump($_SESSION['theme'] ?? null);
    var_dump($_SESSION['user'] ?? null);
    var_dump($_SESSION['uid'] ?? null);
}
