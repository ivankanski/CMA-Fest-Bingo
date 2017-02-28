<?php

session_start();

require_once ('includes/Bingo.php');
require_once ('templates/bingo.html');

$cardHTML = generateNewCard();
$template = file_get_contents('templates/bingo.html');

$bingoCard = str_replace('{{ BINGO CARD }}', $cardHTML, $template);

echo $bingoCard;
