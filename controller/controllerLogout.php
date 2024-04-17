<?php
class controllerLogout{
  public static function readAll(){
    $pageTitle = "Logout";
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/logout", "logout.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}
