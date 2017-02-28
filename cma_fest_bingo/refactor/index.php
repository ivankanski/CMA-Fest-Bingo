<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 2/27/17
 * Time: 10:13 PM
 */

// Autoload PHP classes by namespace, subdir and file extension
spl_autoload_extensions(".php");
spl_autoload_register();

$bingo = new \Classes\CmaFestBingo();

echo $bingo->show_card();
