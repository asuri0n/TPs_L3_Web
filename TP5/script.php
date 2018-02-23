<?php
/**
 * Created by PhpStorm.
 * User: asuri
 * Date: 30/01/2018
 * Time: 11:24
 */

$frg = file_get_contents('fragmentHTML.txt');
echo $frg;

ob_start();
include('fragmentPHP.txt');
$page = ob_get_contents();
ob_end_clean();

echo $page;