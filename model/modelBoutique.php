<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(File::build_path(array("model", "model.php")));

class modelBoutique{
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
  public static function getArticles(){
    $sql = "SELECT * FROM boutique_objets";
    $rep = model::$pdo->query($sql);
    $rep->setFetchMode(PDO::FETCH_CLASS, 'modelBoutique');
    return $rep->fetchAll();
  }
  

  public static function ajouterArticle($nom, $description, $prix, $photo_url) {
      $sql = "INSERT INTO boutique_objets (nom, description, prix, photo_url) VALUES (:nom, :description, :prix, :photo_url)";
      $req_prep = model::$pdo->prepare($sql);
      $values = array(
          'nom' => $nom,
          'description' => $description,
          'prix' => $prix,
          'photo_url' => $photo_url,
      );
      try {
        $req_prep->execute($values);
    } catch (PDOException $e) {
        // Gérer l'erreur ici, par exemple en affichant un message d'erreur à l'utilisateur
        echo 'Erreur : ' . $e->getMessage();
    }
  }

  public static function supprimerArticle($id) {
      $sql = "DELETE FROM boutique_objets WHERE id = :id";
      $req_prep = model::$pdo->prepare($sql);
      $values = array(
          'id' => $id,
      );
      try {
        $req_prep->execute($values);
    } catch (PDOException $e) {
        // Gérer l'erreur ici, par exemple en affichant un message d'erreur à l'utilisateur
        echo 'Erreur : ' . $e->getMessage();
    }
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
