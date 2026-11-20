<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['uid'])) {
    echo '<p>Panel CMS</p>';
} else {
    echo '<p>Brak dostępu. <a href="../index.php?strona=zaloguj">Zaloguj się</a></p>';
}
