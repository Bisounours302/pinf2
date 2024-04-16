<?php
class controllerClub{
  public static function readAll(){
    $pageTitle = "Club";
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/club", "club.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}
