<?php
require_once (File::build_path(array("model", "model.php")));

class modelEquipes
{
    /** ATTRIBUTS **/
    private $nomType;
    /*private $something;*/

    /** CONSTRUCTEUR **/
    public function __construct($nom = NULL/*, $something = NULL*/)
    {
        if (!is_null($nom)/* && !is_null($something)*/) {
            $this->nomType = $nom;
            /*$this->something = $something;*/
        }
    }

    /** GETTERS **/
    public function getNomType()
    {
        return $this->nomType;
    }

    /*public function getSomething(){
    return $this->something;
    }*/

    /** SETTERS **/
    public function setNomType($nom)
    {
        $this->nomType = $nom;
    }

    /*public function setSomething($something){
    $this->something = $something;
    }*/

    /** METHODES **/


    //récupère toutes les équipes différentes de "AUTRES"
    public static function getEquipes()
    {
        $sql = "SELECT nom FROM equipes WHERE nom != 'AUTRES'";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_photos = $req_prep->fetchAll();
        return $tab_photos;
    }

    //récupère tous les entrainements de toutes les équipes (JOIN equipes, entrainement)
    //nomEquipe, jour, heure_debut, heure_fin, lieu
    public static function getEntrainement()
    {
        $sql = "SELECT nom, jour, heure_debut, heure_fin, lieu FROM equipes JOIN entrainement ON equipes.id = entrainement.equipe_id";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_photos = $req_prep->fetchAll();
        return $tab_photos;
    }

    //récupère tous les matchs de toutes les équipes (JOIN equipes, entrainement)
    //nomEquipe, jour, opposant, lieu
    public static function getMatchs()
    {
        $sql = "SELECT nom, jour, opposant, lieu FROM equipes JOIN matchs ON equipes.id = matchs.equipe_id";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_photos = $req_prep->fetchAll();
        return $tab_photos;
    }

    //récupère tous les joueurs de toutes les équipes (JOIN equipes, joueurs)
    //nomEquipe, nom, prenom, entraineur
    public static function getJoueurs()
    {
        $sql = "SELECT equipes.nom, joueurs.nom, prenom, entraineur, photo_url FROM equipes JOIN joueurs ON equipes.id = joueurs.equipe_id";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_photos = $req_prep->fetchAll();
        return $tab_photos;
    }


    public function create()
    {
        $sql = "INSERT INTO types(idType, nomType) VALUES (:idT, :nomT)";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("idT" => NULL, "nomT" => $this->nomType);
        $req_prep->execute($values);
    }

    public function update()
    {
        $sql = 'UPDATE types SET nomType = :nomT';
        $req_prep = model::$pdo->prepare($sql);
        $values = array("nomT" => $this->nomType);
        $req_prep->execute($values);
    }

    public function delete()
    {
        $sql = "DELETE FROM types WHERE nomType = :nomT";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("nomT" => $this->nomType);
        $req_prep->execute($values);
    }
}
