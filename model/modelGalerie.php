<?php
require_once (File::build_path(array("model", "model.php")));

class modelGalerie
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


  //récupère toutes les photos d'une annee de la galerie triées par equipe_id + le nom de l'équipe (JOIN equipes) sous la forme
  //nomEquipe, photo_url
  public static function getPhotos()
  {
    $sql = "SELECT galerie.id, annee, nom, photo_url FROM galerie JOIN equipes ON galerie.equipe_id = equipes.id ORDER BY annee,equipe_id";
    $req_prep = model::$pdo->prepare($sql);
    $req_prep->execute();
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelGalerie');
    $tab_photos = $req_prep->fetchAll();
    return $tab_photos;
  }

  //récupère une photo de la galerie par son id
  public static function getPhoto($id)
  {
    $sql = "SELECT galerie.id, annee, nom, photo_url FROM galerie JOIN equipes ON galerie.equipe_id = equipes.id WHERE galerie.id = :id";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("id" => $id);
    $req_prep->execute($values);
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelGalerie');
    $photo = $req_prep->fetch();
    return $photo;
  }

  public static function getCat()
  {
    $sql = "SELECT id, nom FROM equipes";
    $req_prep = model::$pdo->prepare($sql);
    $req_prep->execute();
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelGalerie');
    $tab_equipes = $req_prep->fetchAll();
    return $tab_equipes;
  }

  public static function ajouterPhoto($annee, $equipe_id, $photo_url)
{
    $sql = "INSERT INTO galerie (annee, equipe_id, photo_url) VALUES (:annee, :equipe_id, :photo_url)";
    $req_prep = model::$pdo->prepare($sql);
    $values = array(
        "annee" => $annee,
        "equipe_id" => $equipe_id,
        "photo_url" => $photo_url
    );
    $req_prep->execute($values);
}

public static function supprimerPhoto($id)
{
    $sql = "DELETE FROM galerie WHERE id = :id";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("id" => $id);
    $req_prep->execute($values);
}
}
