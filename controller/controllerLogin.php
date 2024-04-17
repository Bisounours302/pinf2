<?php
require_once File::build_path(array("model", "modelLogin.php"));

class controllerLogin{
  public static function readAll(){
    $pageTitle = "Login";
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/login", "login.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}

?>