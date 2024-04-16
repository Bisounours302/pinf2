<?php
require_once(File::build_path(array("model", "model.php")));

class modelGalerie{
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


  //récupère toutes les photos d'une annee de la galerie triées par equipe_id + le nom de l'équipe (JOIN equipes) sous la forme
  //nomEquipe, photo_url
  public static function getPhotos(){
    $sql = "SELECT annee, nom, photo_url FROM galerie JOIN equipes ON galerie.equipe_id = equipes.id ORDER BY annee,equipe_id";
    $req_prep = model::$pdo->prepare($sql);
    $req_prep->execute();
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelGalerie');
    $tab_photos = $req_prep->fetchAll();
    return $tab_photos;
  }
    

  public function create(){
    $sql = "INSERT INTO types(idType, nomType) VALUES (:idT, :nomT)";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idT" => NULL, "nomT" => $this->nomType);
    $req_prep->execute($values);
  }

  public function update(){
    $sql = 'UPDATE types SET nomType = :nomT';
    $req_prep = model::$pdo->prepare($sql);
    $values = array("nomT" => $this->nomType);
    $req_prep->execute($values);
  }

  public function delete(){
    $sql = "DELETE FROM types WHERE nomType = :nomT";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("nomT" => $this->nomType);
    $req_prep->execute($values);
  }
}
