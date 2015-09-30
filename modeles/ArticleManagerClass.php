<?php

/**
 * Description of ArticleManager
 *
 * @author Michael
 */
class ArticleManager {


  protected $db;

  public function __construct()
  {
    $this->db = MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, true);
  }

    public  function getList(){
        $recup = $this->db->query("SELECT a.*, u.lelogin FROM article  a
            INNER JOIN utilisateur u ON a.utilisateur_id = u.id ORDER BY a.id DESC;");
        return $recup->fetchAll(PDO::FETCH_OBJ);
    }
    public  function getUn($slug){
        $prepare = $this->db->prepare("SELECT a.*, u.lelogin FROM article a
            INNER JOIN utilisateur u ON a.utilisateur_id = u.id WHERE a.leslug = ? ORDER BY a.id DESC ;");
        $prepare->bindParam(1,$slug,PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch(PDO::FETCH_OBJ);
    }
   
}

