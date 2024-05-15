<?php
require_once(File::build_path(array("model", "model.php")));

class modelAccueil{
  /** ATTRIBUTS **/
  private $nomType;
  /*private $something;*/

  /** CONSTRUCTEUR **/
  public function __construct($nom = NULL/*, $something = NULL*/){
    if(!is_null($nom)/* && !is_null($something)*/){
      $this->nomType = $nom;
      /*$this->something = $something;*/
    }
  }

  /** GETTERS **/
  public function getNomType(){
    return $this->nomType;
  }

  /*public function getSomething(){
  return $this->something;
  }*/

  /** SETTERS **/
  public function setNomType($nom){
    $this->nomType = $nom;
  }

  /*public function setSomething($something){
  $this->something = $something;
  }*/

  /** METHODES **/

  
  public static function getMatchs(){
    // On récupère tous les match après la date actuelle dans l'order chronologique
    $sql = "SELECT nom, dateMatch, opposant, adresse FROM matchs JOIN equipes ON equipes.id = matchs.equipe WHERE dateMatch >= CURDATE() ORDER BY dateMatch";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelAccueil');
    return $rep->fetchAll();
  }

}
