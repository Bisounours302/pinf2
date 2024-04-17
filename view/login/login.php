
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (ModelLogin::checkIdentifiants($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        echo 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
} else {
    echo '<form method="post" action="index.php?controller=Login">';
    echo '<label for="username">Nom d\'utilisateur:</label>';
    echo '<input type="text" id="username" name="username">';
    echo '<label for="password">Mot de passe:</label>';
    echo '<input type="password" id="password" name="password">';
    echo '<input type="submit" value="Se connecter">';
    echo '</form>';
}
?>
