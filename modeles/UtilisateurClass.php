<?php

class Utilisateur
{

    private $id;
    private $lelogin;
    private $lepass;
    private $lemail;
    private $droit_id;


    public function __construct(array $param) {
        $this->trouveMethodes($param);
    }
    
    private function trouveMethodes($param) {
        if(isset($param)){
            foreach ($param as $clef => $valeur) {
                $nom = 'set'.ucfirst($clef);
                if(method_exists($this, $nom)){
                    $this->$nom($valeur);
                }
            }
        }
    }


    public function getId()
    {
        return $this->id;
    }

    
    public function setLelogin($lelogin)
    {
        $this->lelogin = $lelogin;

        return $this;
    }

    public function getLelogin()
    {
        return $this->lelogin;
    }

    public function setLepass($lepass)
    {
        $this->lepass = $lepass;

        return $this;
    }

    public function getLepass()
    {
        return $this->lepass;
    }

    public function setLemail($lemail)
    {
        $this->lemail = $lemail;

        return $this;
    }

    public function getLemail()
    {
        return $this->lemail;
    }

    public function setDroit_id($droit_id)
    {
        $this->droit_id = $droit_id;

        return $this;
    }

    public function getDroit_id()
    {
        return $this->droit_id;
    }

}
