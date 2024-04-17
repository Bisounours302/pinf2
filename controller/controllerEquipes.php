<?php
require_once (File::build_path(array("model", "modelEquipes.php")));

//affichage d'erreur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class controllerEquipes
{
  public static function readAll($idEquipe)
  {
    $pageTitle = "Equipes";
    $modelEquipes = new modelEquipes();
    $tab_equipes = $modelEquipes->getEquipes();
    $tab_entrainements = $modelEquipes->getEntrainements($idEquipe);
    $tab_joueurs = $modelEquipes->getJoueurs($idEquipe);
    $tab_matchs = $modelEquipes->getMatchs($idEquipe);
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view/equipes", "equipes.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function ajouterEntrainement()
  {
    // Récupérez les données du formulaire
    $idEquipe = $_POST['idEquipe'];
    $jourEntrainement = $_POST['jour'];
    $heureDebutEntrainement = $_POST['heure_debut'];
    $heureFinEntrainement = $_POST['heure_fin'];
    $lieuEntrainement = $_POST['lieu'];

    // Validez les données (exemple simple)
    if (empty($idEquipe) || empty($jourEntrainement) || empty($heureDebutEntrainement) || empty($heureFinEntrainement) || empty($lieuEntrainement)) {
      echo "Tous les champs sont requis.";
      return;
    }

    // Ajoutez un nouvel entrainement avec les données
    $modelEquipes = new modelEquipes();
    $modelEquipes->ajouterEntrainement($idEquipe, $jourEntrainement, $heureDebutEntrainement, $heureFinEntrainement, $lieuEntrainement);

    // Redirigez l'utilisateur vers la page de l'équipe
    header('Location: index.php?controller=equipes&equipe=' . $idEquipe);
  }

  public static function ajouterMatch()
  {
    // Récupérez les données du formulaire
    $idEquipe = $_POST['idEquipe'];
    $dateMatch = $_POST['dateMatch'];
    $lieuMatch = $_POST['adresse'];
    $adversaire = $_POST['opposant'];

    // Validez les données (exemple simple)
    if (empty($idEquipe) || empty($dateMatch) || empty($lieuMatch) || empty($adversaire)) {
      echo "Tous les champs sont requis.";
      return;
    }

    // Ajoutez un nouveau match avec les données
    $modelEquipes = new modelEquipes();
    $modelEquipes->ajouterMatch($idEquipe, $dateMatch, $lieuMatch, $adversaire);

    // Redirigez l'utilisateur vers la page de l'équipe
    header('Location: index.php?controller=Equipes&equipe=' . $idEquipe);
  }

  public static function ajouterJoueur() {
    // Récupérez les données du formulaire
    $idEquipe = $_POST['idEquipe'];
    $nomJoueur = $_POST['nom'];
    $prenomJoueur = $_POST['prenom'];
    $entraineur = $_POST['entraineur'];
    $photo = $_FILES['photo_url'];

    // Validez les données (exemple simple)
    if (empty($idEquipe) || empty($nomJoueur) || empty($prenomJoueur) || $photo['error'] == 4) {
        echo "Tous les champs sont requis.";
        return;
    }

    // Déplacez la photo vers le dossier spécifié
    $target_dir = "/var/www/html/pinf2/resources/img/joueurs/";
    $target_file = $target_dir . basename($photo["name"]);
    //Vérifiez si le fichier existe déjà mais s'ils ont la même taille ajouter à la bdd quand même
    if (file_exists($target_file) ) {
        if ($photo["size"] == filesize($target_file)) {
            // Ajoutez un nouveau joueur avec les données
            $modelEquipes = new modelEquipes();
            $modelEquipes->ajouterJoueur($idEquipe, $nomJoueur, $prenomJoueur, $entraineur, $photo['name']);
            // Redirigez l'utilisateur vers la page de l'équipe
            header('Location: index.php?controller=Equipes&id='.$idEquipe);
            return;
        }
        echo $photo["size"];
        echo filesize($target_file);
        echo "Désolé, le fichier existe déjà.";
        return;
    }


    //Vérifiez la taille du fichier
    if ($photo["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.";
        return;
    }
    //Vérifiez le format du fichier
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Désolé, seuls les fichiers JPG, JPEG et PNG sont autorisés.";
        return;
    }
    //Déplacez le fichier
    if (!move_uploaded_file($photo["tmp_name"], $target_file)) {
        echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
        return;
    }

    // Ajoutez un nouveau joueur avec les données
    $modelEquipes = new modelEquipes();
    $modelEquipes->ajouterJoueur($idEquipe, $nomJoueur, $prenomJoueur, $entraineur, $photo['name']);

    // Redirigez l'utilisateur vers la page de l'équipe
    header('Location: index.php?controller=equipes&equipe='.$idEquipe);
}

  public static function supprimerEntrainement()
  {
    // Récupérez les données du formulaire
    $idEquipe = $_POST['idEquipe'];
    $jour = $_POST['jour'];

    // Validez les données (exemple simple)
    if (empty($idEquipe) || empty($jour)) {
      echo "Tous les champs sont requis.";
      return;
    }

    // Supprimez l'entrainement avec les données
    $modelEquipes = new modelEquipes();
    $modelEquipes->suppEntrainement($idEquipe, $jour);

    // Redirigez l'utilisateur vers la page de l'équipe
    header('Location: index.php?controller=Equipes&equipe='.$idEquipe);
  }

  public static function supprimerMatch()
  {
    // Récupérez les données du formulaire
    $idEquipe = $_POST['idEquipe'];  
    $idMatch = $_POST['idMatch'];

    // Validez les données (exemple simple)
    if (empty($idEquipe) || empty($idMatch)) {
      echo "Tous les champs sont requis.";
      return;
    }

    // Supprimez le match avec les données
    $modelEquipes = new modelEquipes();
    $modelEquipes->suppMatch($idMatch);

    // Redirigez l'utilisateur vers la page de l'équipe
    header('Location: index.php?controller=Equipes&equipe='.$idEquipe);
  }

  public static function supprimerJoueur()
  {
    // Récupérez les données du formulaire
    $idEquipe = $_POST['idEquipe'];
    $idJoueur = $_POST['idJoueur'];
    $photo_url = $_POST['photo_url'];

    // Validez les données (exemple simple)
    if (empty($photo_url) || empty($idJoueur)) {
      echo "Tous les champs sont requis.";
      return;
    }
    
    // Supprimez la photo du joueur
    $target_dir = "/var/www/html/pinf2/resources/img/joueurs/";
    $target_file = $target_dir . basename($photo_url);
    if (file_exists($target_file)) {
      unlink($target_file);
    }

    // Supprimez le joueur avec les données
    $modelEquipes = new modelEquipes();
    $modelEquipes->suppJoueur($idJoueur);

    // Redirigez l'utilisateur vers la page de l'équipe
    header('Location: index.php?controller=Equipes&equipe='.$idEquipe);

  }
}
