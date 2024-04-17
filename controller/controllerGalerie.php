<?php
require_once File::build_path(array("model", "modelGalerie.php"));
require_once File::build_path(array("model", "modelEquipes.php"));


//affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class controllerGalerie
{
  public static function readAll()
  {
    $pageTitle = "Galerie";
    $modelGalerie = new modelGalerie();
    $images = $modelGalerie->getPhotos();
    $equipes = $modelGalerie->getCat();
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view/galerie", "galerie.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function ajouterPhoto()
  {
    $annee = $_POST['annee'];
    $equipe = explode(',', $_POST['equipe']); // Récupérez l'ID et le nom de l'équipe à partir du formulaire
    $equipe_id = $equipe[0];
    $equipe_nom = $equipe[1];
    $photo_url = $_FILES['photo']['name'];
    $target_dir = "/var/www/html/pinf2/resources/img/galerie/$annee/$equipe_nom/";

    if (is_dir($target_dir)) {
      $target_file = $target_dir . basename($photo_url);
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        modelGalerie::ajouterPhoto($annee, $equipe_id, $photo_url);
        header('Location: index.php?controller=Galerie');
      } else {
        echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
      }
    } else {
      echo "Le dossier de destination $target_dir n'existe pas.";
    }
  }

  public static function supprimerPhoto()
  {
    $photo_id = $_POST['photo_id'];
    $photo = modelGalerie::getPhoto($photo_id);
    $target_file = "/var/www/html/pinf2/resources/img/galerie/$photo->annee/$photo->nom/$photo->photo_url";
    if (unlink($target_file)) {
      modelGalerie::supprimerPhoto($photo_id);
      header('Location: index.php?controller=Galerie');
    } else {
      echo "Désolé, il y a eu une erreur lors de la suppression de votre fichier.";
    }
  }
}
