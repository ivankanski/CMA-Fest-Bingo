<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 2/27/17
 * Time: 10:13 PM
 */

require_once('Classes/cma_bingo.php');

$bingo = new cma_bingo();

echo $bingo->show_card();
