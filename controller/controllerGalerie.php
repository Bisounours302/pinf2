<?php
require_once File::build_path(array("model", "modelGalerie.php"));

class controllerGalerie{
  public static function readAll(){
    $pageTitle = "Galerie";
    $modelGalerie = new modelGalerie();
    $images= $modelGalerie->getPhotos();
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/galerie", "galerie.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}
