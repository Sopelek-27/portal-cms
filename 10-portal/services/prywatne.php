<?php
if (isset($_SESSION['user']) && isset($_SESSION['uid'])) {
    echo '<p>Sekretne informacje</p>';
} else {
    echo '<p>Brak dostępu. <a href="index.php?strona=zaloguj">Zaloguj się</a></p>';
}
