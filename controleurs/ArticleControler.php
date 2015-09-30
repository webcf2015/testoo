<?php
// Appel les modèles
require 'modeles/maPDOClass.php';
require 'modeles/ArticleClass.php';
require 'modeles/ArticleManagerClass.php';




// si on veut afficher une page
if(isset($_GET['page'])){
    $manage = new ArticleManager();
    $un = $manage->getUn($_GET['page']);
    // Appel de la vue
    require_once 'vues/pageArticleVue.php';

// si on est sur l'accueil    
}else{
    $manage = new ArticleManager();
    $tous = $manage->getList();
    // Appel de la vue
    require_once 'vues/accueilArticleVue.php';
    
}


?>
