<?php
require __DIR__ . '/vendor/autoload.php';

$estructuraRepository = new Nico\Repository\EstructuraRepository_Repository();
$estructuraCollection = $estructuraRepository->findPadres();

foreach ($estructuraCollection as $estructura) {
    var_dump($estructura);
}