<?php
/*
 * On indique que les chemins des fichiers qu'on inclut
 * seront relatifs au répertoire src.
 */
set_include_path("./src");

/* Inclusion des classes utilisées dans ce fichier */
require_once("Router.php");

require_once("model/AnimalStorageMySQL.php");

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "tp_l3");

/*
 * Cette page est simplement le point d'arrivée de l'internaute
 * sur notre site. On se contente de créer un routeur
 * et de lancer son main.
 */
$pdo = new PDO('mysql:dbname='.DATABASE.';host='.HOST,USER ,PASSWORD);
$animalStorage = new AnimalStorageMySQL($pdo);
//$animalStorage->reinit();
$router = new Router($animalStorage);
$router->main();
?>