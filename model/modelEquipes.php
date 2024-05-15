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
        $sql = "SELECT id, nom FROM equipes WHERE nom != 'AUTRES'";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_equipes = $req_prep->fetchAll();
        return $tab_equipes;
    }

    //récupère tous les entrainements de l'équipes (JOIN equipes, entrainement)
    //nomEquipe, jour, heure_debut, heure_fin, lieu
    public static function getEntrainements($idEquipe)
    {
        $sql = "SELECT nom, jour, heure_debut, heure_fin, lieu FROM equipes JOIN entrainement ON equipes.id = entrainement.equipe_id WHERE equipes.id = $idEquipe";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_entrainement = $req_prep->fetchAll();
        return $tab_entrainement;
    }

    //récupère tous les matchs de toutes les équipes (JOIN equipes, entrainement)
    //nomEquipe, jour, opposant, lieu
    public static function getMatchs($idEquipe)
    {
        $sql = "SELECT matchs.id, nom, dateMatch, opposant, adresse FROM equipes JOIN matchs ON equipes.id = matchs.equipe WHERE equipes.id = $idEquipe";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_matchs = $req_prep->fetchAll();
        return $tab_matchs;
    }

    //récupère tous les joueurs de toutes les équipes (JOIN equipes, joueurs)
    //nomEquipe, nom, prenom, entraineur
    public static function getJoueurs($idEquipe)
    {
        $sql = "SELECT id_joueur, equipes.nom, joueurs.nom, prenom, entraineur, photo_url FROM equipes JOIN joueurs ON equipes.id = joueurs.id_equipe WHERE equipes.id = $idEquipe";
        $req_prep = model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelEquipes');
        $tab_joueurs = $req_prep->fetchAll();
        return $tab_joueurs;
    }

    public static function ajouterEntrainement($idEquipe, $jour, $heure_debut, $heure_fin, $lieu)
    {
        $sql = "INSERT INTO entrainement(equipe_id, jour, heure_debut, heure_fin, lieu) VALUES (:equipe_id, :jour, :heure_debut, :heure_fin, :lieu)";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("equipe_id" => $idEquipe, "jour" => $jour, "heure_debut" => $heure_debut, "heure_fin" => $heure_fin, "lieu" => $lieu);
        $req_prep->execute($values);
    }

    public static function ajouterMatch($idEquipe, $dateMatch, $lieuMatch, $adversaire)
    {
        $sql = "INSERT INTO matchs(equipe, dateMatch, adresse, opposant) VALUES (:equipe, :dateMatch, :adresse, :opposant)";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("equipe" => $idEquipe, "dateMatch" => $dateMatch, "adresse" => $lieuMatch, "opposant" => $adversaire);
        $req_prep->execute($values);
    }

    public static function ajouterJoueur($idEquipe, $nom, $prenom, $entraineur, $photo_url)
    {
        $sql = "INSERT INTO joueurs(id_equipe, nom, prenom, photo_url, entraineur) VALUES (:id_equipe, :nom, :prenom, :photo_url, :entraineur)";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("id_equipe" => $idEquipe, "nom" => $nom, "prenom" => $prenom, "photo_url" => $photo_url, "entraineur" => $entraineur);
        $req_prep->execute($values);
    }

    public static function suppEntrainement($idEquipe, $jour)
    {
        $sql = "DELETE FROM entrainement WHERE equipe_id = :equipe_id AND jour = :jour";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("equipe_id" => $idEquipe, "jour" => $jour);
        $req_prep->execute($values);
    }

    public static function suppMatch($idMatch)
    {
        $sql = "DELETE FROM matchs WHERE id = :id";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("id" => $idMatch);
        $req_prep->execute($values);
    }

    public static function suppJoueur($idJoueur)
    {
        $sql = "DELETE FROM joueurs WHERE id_joueur = :id";
        $req_prep = model::$pdo->prepare($sql);
        $values = array("id" => $idJoueur);
        $req_prep->execute($values);
    }

}
