<?php
$routes = array(
    'glowna'    => array('label' => 'Strona główna'),
    'o-firmie'  => array('label' => 'O firmie'),
    'oferta'    => array('label' => 'Oferta'),
    'galeria'   => array('label' => 'Galeria'),
    'kontakt'   => array('label' => 'Kontakt'),
    'zaloguj'   => array('label' => 'Zaloguj'),
    'wyloguj'   => array('label' => 'Wyloguj'),
    'prywatne'  => array('label' => 'Prywatne')
);

$menu = '';
foreach ($routes as $pageID => $page) {
    $adresURL = 'index.php?strona=' . $pageID;
    $menu .= '<a href="' . $adresURL . '">' . $page['label'] . '</a> ';
}
echo '<nav>' . $menu . '</nav>';
?>
<main>
