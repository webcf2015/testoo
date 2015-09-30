<?php

/**
 * Description of AdminArticleManager
 *
 * @author Michael
 */
class AdminArticleManager extends ArticleManager {

    public  function getListRedac($id){
        $prepare = $this->db->prepare("SELECT a.*, u.lelogin FROM article a
            INNER JOIN utilisateur u ON a.utilisateur_id = u.id WHERE a.utilisateur_id = ? ORDER BY a.id DESC ;");
        $prepare->bindParam(1,$id,PDO::PARAM_INT);
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    public  function updateArticle(Article $modif, $slug){
        $leslug = htmlentities($slug,ENT_QUOTES);
        $titre = $modif->getLetitre();
        $slug = $modif->getLeslug();
        $texte =$modif->getLetexte();
        $date = $modif->getLadate();
        $idutil =$modif->getUtilisateur_id();
        // sécurité !!!
        // pas possible de modifier utilisateur_id si on est rédacteur, ni l'article de quelqu'un d'autre
        if($_SESSION['droit_id']==3){
            $util_id ="";
            $and = "AND utilisateur_id=".$_SESSION['id'];
        }else{
            $util_id =", utilisateur_id=$idutil";
            $and = "";
        }
        
        $prepare = $this->db->prepare("UPDATE article SET letitre=?, leslug=?, letexte=?, ladate=? $util_id WHERE leslug = '$leslug' $and");
        $prepare->bindParam(1,$titre,PDO::PARAM_STR);
        $prepare->bindParam(2,$slug,PDO::PARAM_STR);
        $prepare->bindParam(3,$texte,PDO::PARAM_STR);
        $prepare->bindParam(4,$date,PDO::PARAM_STR);
        return $prepare->execute();
    }
    public  function deleteArticle($id){
        $idarticle = (int) $id;
        // sécurité !!!
        // A part l'admin, on ne peut supprimer que ses articles
        if($_SESSION['droit_id']!=1){
            $and = "AND utilisateur_id=".$_SESSION['id'];
        }else{
            $and = "";
        }
        
        $prepare = $this->db->prepare("DELETE FROM article WHERE id = $idarticle $and");

        return $prepare->execute();
    }
   
    public  function ajouteArticle(Article $met){
        $titre = $met->getLetitre();
        $slug = $met->getLeslug();
        $texte =$met->getLetexte();
        $date = $met->getLadate();
        $idutil =(int) $_SESSION['id'];
        
        $prepare = $this->db->prepare("INSERT INTO article VALUES (NULL,?,?,?,?,?);");
        $prepare->bindParam(1,$titre,PDO::PARAM_STR);
        $prepare->bindParam(2,$slug,PDO::PARAM_STR);
        $prepare->bindParam(3,$texte,PDO::PARAM_STR);
        $prepare->bindParam(4,$date,PDO::PARAM_STR);
        $prepare->bindParam(5,$idutil,PDO::PARAM_STR);
        return $prepare->execute();
    }
}

