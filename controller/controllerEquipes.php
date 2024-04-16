<?php
require_once(File::build_path(array("model", "modelEquipes.php")));
class controllerEquipes{
  public static function readAll(){
    $pageTitle = "Equipes";
    $modelEquipes = new modelEquipes();
    $tab_equipes = $modelEquipes -> getEquipes();
    $tab_entrainements = $modelEquipes -> getEntrainement();
    $tab_joueurs = $modelEquipes -> getJoueurs();
    $tab_matchs = $modelEquipes -> getMatchs();
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/equipes", "equipes.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}
