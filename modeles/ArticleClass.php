<?php

class Article {

    private $id;
    private $letitre;
    private $leslug;
    private $letexte;
    private $ladate;
    private $utilisateur_id;

    public function __construct(array $param) {
        $this->trouveMethodes($param);
        $this->setLeslug($this->creeSlug($this->getLetitre()));
    }

    private function trouveMethodes($param) {
        if (isset($param)) {
            foreach ($param as $clef => $valeur) {
                $nom = 'set' . ucfirst($clef);
                if (method_exists($this, $nom)) {
                    $this->$nom($valeur);
                }
            }
        }
    }

    private function creeSlug($text) {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        $text = strtolower($text);

        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function getId() {
        return $this->id;
    }

    public function setLetitre($letitre) {
        $this->letitre = htmlentities(strip_tags(trim($letitre)),ENT_QUOTES);

        return $this;
    }

    public function getLetitre() {
        return $this->letitre;
    }

    public function setLeslug($leslug) {
        $this->leslug = $leslug;

        return $this;
    }

    public function getLeslug() {
        return $this->leslug;
    }

    public function setLetexte($letexte) {
        $this->letexte = htmlentities(strip_tags($letexte),ENT_QUOTES);

        return $this;
    }

    public function getLetexte() {
        return $this->letexte;
    }

    public function setUtilisateur_id($utilisateur_id) {
        $this->utilisateur_id = (int) $utilisateur_id;

        return $this;
    }

    public function getUtilisateur_id() {
        return $this->utilisateur_id;
    }

    public function setLadate($ladate) {
        $this->ladate = $ladate;

        return $this;
    }

    public function getLadate() {
        return $this->ladate;
    }

}
