<?php
require_once File::build_path(array("model", "modelBoutique.php"));
class controllerBoutique
{
  public static function readAll()
  {
    $pageTitle = "Boutique";
    $modelBoutique = new modelBoutique();
    $articles = $modelBoutique->getArticles();
    $cheminImages = "/pinf2/resources/img/boutique/";
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view/boutique", "boutique.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function ajtArticle()
  {
    if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_FILES['photo'])) {
      $nom = $_POST['nom'];
      $description = $_POST['description'];
      $prix = $_POST['prix'];

      // Vous devez gérer le téléchargement du fichier ici
      // Par exemple, vous pouvez déplacer le fichier téléchargé dans le dossier /resources/img/boutique/
      $target_dir = "/var/www/html/pinf2/resources/img/boutique/";
      $target_file = $target_dir . basename($_FILES["photo"]["name"]);

      // Vérifiez si le répertoire de destination est accessible en écriture
      if (!is_writable($target_dir)) {
        die('Erreur : le répertoire de destination n\'est pas accessible en écriture.');
      }

      // Vérifiez si le fichier a été téléchargé sans erreur
      if ($_FILES["photo"]["error"] !== UPLOAD_ERR_OK) {
        die('Erreur : le téléchargement du fichier a échoué avec le code d\'erreur ' . $_FILES["photo"]["error"]);
      }

      $photo_url = $_FILES['photo']['name'];

      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    
      // Vérifier si le fichier existe déjà
      if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
      }

      // Vérifier la taille du fichier
      if ($_FILES["photo"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
      }

      // Autoriser certains formats de fichiers
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
      }

      // Vérifier si $uploadOk est défini à 0 par une erreur
      if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
        // si tout est ok, essayer de télécharger le fichier
      } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
          echo "Le fichier " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " a été téléchargé.";
        } else {
          echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
      }


      // Ensuite, vous pouvez appeler la méthode ajouterArticle
      if ($uploadOk == 1) {
        modelBoutique::ajouterArticle($nom, $description, $prix, $photo_url);
        header('Location: index.php?controller=boutique&action=readAll');
      } else {
        // Gérer le cas où le téléchargement du fichier a échoué
      }
      
    } else {
      // Gérer le cas où certains champs sont manquants
    }
  }
  //fonction getArticle

  public static function supprimerArticle()
  {
    $article_id = $_POST['article_id'];
    $photo_url = $_POST['photo_url'];
    $target_file = "/var/www/html/pinf2/resources/img/boutique/$photo_url";
    if (unlink($target_file)) {
      modelBoutique::supprimerArticle($article_id);
      header('Location: index.php?controller=Boutique');
    } else {
      echo "Désolé, il y a eu une erreur lors de la suppression de votre fichier.";
    }
  }
}

