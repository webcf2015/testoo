<?php

/**
 * Description of UtilisateurManager
 *
 * @author Michael
 */
class UtilisateurManager {


  private $db;

  public function __construct()
  {
    $this->db = MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, true);
  }
  
    public function getList(){
        $recup = $this->db->query("SELECT * FROM utilisateur ORDER BY id ASC;");
        return $recup->fetchAll(PDO::FETCH_OBJ);
    }

    public function connectUn($login,$pwd){
        $prepare = $this->db->prepare("SELECT u.id, u.lelogin, u.lemail, u.droit_id, d.ledroit FROM  utilisateur u
            INNER JOIN droit d ON u.droit_id = d.id WHERE u.lelogin = :log AND u.lepass = :pwd ;");
        $prepare->bindParam(":log",$login,PDO::PARAM_STR);
        $prepare->bindParam(":pwd",$pwd,PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch(PDO::FETCH_ASSOC);
    }
   
}

