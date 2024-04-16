<?php
class controllerContacts{
  public static function readAll(){
    $pageTitle = "Contacts";
    require(File::build_path(array("view", "navbar.php")));
    require(File::build_path(array("view/contacts", "contacts.php")));
    require(File::build_path(array("view", "footer.php")));
  }
}
