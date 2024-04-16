<?php

require_once File::build_path(array("model", "modelBoutique.php"));
class controllerBoutique{
    public static function readAll(){
    $pageTitle = "Boutique";
    $modelBoutique = new modelBoutique();
    $articles = $modelBoutique->getArticles();
    $cheminImages = "/pinf2/resources/img/boutique/";
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/boutique", "boutique.php")));
    require(File::build_path(array("view", "footer.php")));
    }


  //fonction getArticle
  
}
