<?php

require_once File::build_path(array("model", "modelAccueil.php"));
class controllerAccueil{
  public static function readAll(){
    $pageTitle = "Accueil";
    $modelAccueil = new modelAccueil();
    $matchs = $modelAccueil->getMatchs();
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/accueil", "accueil.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}
