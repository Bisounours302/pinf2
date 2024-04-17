<?php

require_once(File::build_path(array("model", "model.php")));
class ModelLogin {
    public static function checkIdentifiants($username, $password) {
        $sql = "SELECT * FROM users WHERE pseudo = :username";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute([':username' => $username]);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelLogin');
    
        if ($user = $req_prep->fetch()) {
            if (password_verify($password, $user->motdepasse)) {
                return true;
            }
        }
    
        return false;
    }
}
