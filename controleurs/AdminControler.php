<?php
// Appel les modèles
require 'modeles/maPDOClass.php';
require 'modeles/sessionClass.php';
require 'modeles/UtilisateurClass.php';
require 'modeles/UtilisateurManagerClass.php';




// si on essaye de se connecter
if(isset($_POST['lelogin'])){
    $manage = new UtilisateurManager();
    $un = $manage->connectUn($_POST['lelogin'],$_POST['lepass']);
    if($un){
        $maSession = new Session();
        foreach ($un as $clef => $valeur) {
            $maSession->write($clef,$valeur);
        }
        $maSession->write("idutil",session_id());
        // redirection
        header("Location: ./");
    }else{
        // création erreur
        $erreur_login = "Mauvais Login ou mot de passe!";
        // Appel de la vue
        require_once 'vues/connexionVue.php';
    }
    
// si on veut se déconnecter ou que notre connexion n'est plus valide
}elseif(isset($_GET['deco'])){
    Session::deconnectSession();
    // redirection
    header("Location: ./");
    
    
// si on est connecté
}elseif(isset($_SESSION['idutil'])&&$_SESSION['idutil']==session_id()){
    
    // appel des modèles nécessaires
    require 'modeles/ArticleClass.php';
    require 'modeles/ArticleManagerClass.php';
    require 'modeles/AdminArticleManagerClass.php';
    
    
    switch($_SESSION['droit_id']){
        case 1 : // si admin
        case 2 : // ou modérateur
            $manage = new AdminArticleManager();
            $prend = $manage->getList();
            break;
        case 3 : // si rédacteur
            $manage = new AdminArticleManager();
            $prend = $manage->getListRedac( (int) $_SESSION['id']);
            break;
        
    }

// si on est sur la page d'accueil de l'admin
    if(empty($_GET)){
        
    // Appel de la vue
    require_once 'vues/accueilAdminVue.php';
    }

// si on essaye de modifier (affichage formulaire
    if(isset($_GET['slug'])&&empty($_POST['mod'])){
        // récupération de l'article
        $modif = $_GET['slug'];
        $recup = $manage->getUn($modif);
        // récupération de tous les utilisateurs
        $manageUtil = new UtilisateurManager();
        $util = $manageUtil->getList();
        
        // Appel de la vue
        require_once 'vues/modifieAdminVue.php';
    }

// on a cliqué sur envoyer la modification
    if(isset($_GET['slug'])&&isset($_POST['mod'])){
        // récupération de l'article
        $modif = $_GET['slug'];
        $modifArticle = new Article($_POST['mod']);
        // récupération du gestionnaire d'article
        $manageArt = new AdminArticleManager();
        $manageArt->updateArticle($modifArticle, $modif);
        
        // Redirection
        header("Location: ./");
    }
    
// on a cliqué sur ajouter
    if(isset($_GET['ajout'])&&empty($_POST['met'])){
        // heure par défaut
        $heure = date("Y-m-d H:i:s");
        // récupération de tous les utilisateurs
        $manageUtil = new UtilisateurManager();
        $util = $manageUtil->getList();
        
        // Appel de la vue
        require_once 'vues/ajouteAdminVue.php';
    }
// on valide l'ajout
    if(isset($_GET['ajout'])&&isset($_POST['met'])){
        // création d'un article
        $metArticle = new Article($_POST['met']);
        // si ajout d'article
        if($manage->ajouteArticle($metArticle)){
        
        // redirection
            header("Location: ./");
        }
    }
    
// on a cliqué sur supprimer
    if(isset($_GET['sup'])&&  ctype_digit($_GET['sup'])){
        $sup = (int)$_GET['sup'];
        if($manage->deleteArticle($sup)){
            // redirection
            header("Location: ./");
        }
    }
    
// si on doit se connecter
}else{
    // Appel de la vue
    require_once 'vues/connexionVue.php';
}


?>
