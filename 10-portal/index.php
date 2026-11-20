<?php

include('./etc/conf.php');


session_start();
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $lang;
}
if (!isset($_SESSION['mode'])) {
    $_SESSION['mode'] = 'light';
}
if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'default';
}


$katalogUslug = './services/';
$podstrona = $_GET['strona'] ?? 'glowna';


if ($podstrona === 'wyloguj') {
    include('./services/wyloguj.php');
}


if ($https === true && $podstrona === 'zaloguj') {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off' || $_SERVER['HTTPS'] === '') {
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit;
    }
}


if (!isset($_SESSION['uid']) && isset($_COOKIE['uid'])) {
    if ($_COOKIE['uid'] === (string) $loginUID) {
        $_SESSION['uid'] = $loginUID;
        $_SESSION['user'] = $loginUser;
    }
}


if ($podstrona === 'zaloguj' && ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $uzytkownik = $_POST['uzytkownik'] ?? '';
    $haslo = $_POST['haslo'] ?? '';

    if ($uzytkownik === $loginUser && $haslo === $loginPass) {
        $_SESSION['user'] = $loginUser;
        $_SESSION['uid'] = $loginUID;

        if (isset($_POST['zapamietaj'])) {
            setcookie('uid', (string) $loginUID, time() + 30 * 24 * 60 * 60, '/');
        } else {
            setcookie('uid', '', time() - 3600, '/');
        }
        header('Location: index.php?strona=prywatne');
        exit;
    } else {
        $bladLogowania = true;
    }
}


include('./views/naglowek.php');
include('./views/menu.php');


if (isset($podstrona) && isset($routes[$podstrona])) {
    $katalogPodstrona = $katalogUslug . $podstrona . '.php';
    if (file_exists($katalogPodstrona)) {
        include($katalogPodstrona);
    } else {
        echo '<p>Podstrona ' . htmlspecialchars($podstrona, ENT_QUOTES, 'UTF-8') . ' nie została odnaleziona!</p>';
    }
} else {
    echo '<p>Podstrona nie została odnaleziona!</p>';
}


include('./views/stopka.php');
include('./services/debug.php');
