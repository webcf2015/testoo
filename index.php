<?php
// pour l'affichage des erreurs sur OVH
ini_set("display_errors","1");
/* 
 * Contrôleur frontal
 */
// lancement du session_start
session_start();

// dépendances
require 'config/configDB.php';

// routage vers contrôleurs

// si on est connecté OU on souhaite se connecter
if(isset($_SESSION['idutil'])||isset($_GET['connect'])){
    require 'controleurs/AdminControler.php';
}
// si on est un simple visiteur
else{
    require 'controleurs/ArticleControler.php';
}