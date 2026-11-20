<?php
if (isset($_SESSION['user']) && isset($_SESSION['uid'])) {
    echo '<p>Zalogowano jako: ' . htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8') . '</p>';
} else {
    if (isset($bladLogowania)) {
        echo '<p>Nieprawidłowy użytkownik lub hasło.</p>';
    }
    ?>
    <form action="index.php?strona=zaloguj" method="post">
        <fieldset>
            <legend>Logowanie</legend>
            <div><label for="uzytkownik">Użytkownik:</label>
                <input type="text" name="uzytkownik" id="uzytkownik" required></div>
            <div><label for="haslo">Hasło:</label>
                <input type="password" name="haslo" id="haslo" required></div>
            <div><label for="zapamietaj">Zapamiętaj mnie</label>
                <input type="checkbox" name="zapamietaj" id="zapamietaj" value="1"></div>
            <button type="submit">Zaloguj</button>
        </fieldset>
    </form>
    <?php
}
