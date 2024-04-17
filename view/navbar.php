<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php if(!isset($y)){ echo $pageTitle;} ?></title>
        <link rel="stylesheet" type="text/css" href="/pinf2/resources/css/style.css"> <!-- Inclure ici votre css -->
        <script src="/pinf2/resources/script/script.js"></script> <!-- Inclure ici votre js -->
        <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> Inclure ici votre favicon -->
        <!-- <link rel="icon" href="/favicon.ico" type="image/x-icon"> -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v19.0" nonce="BmQoRgeh"></script>
    </head>
    <body>
    <header <?php if(isset($_SESSION['username'])) { echo 'style="background-color: red;"'; } ?>>
        <a href="index.php?controller=Accueil">
            <img src="/pinf2/resources/img/logo/logoClub.png" alt="Logo du club de basket" class="logoClub">    
        </a>
        <ul class="conteneurOnglets">
            <li class="onglet" style=""><a href="index.php?controller=Accueil">Accueil</a></li>
            <li class="onglet"><a href="index.php?controller=Club">Club</a></li>
            <li class="onglet"><a href="index.php?controller=Equipes">Équipes</a></li>
            <li class="onglet"><a href="index.php?controller=Galerie">Galerie</a></li>
            <li class="onglet"><a href="index.php?controller=Boutique">Boutique</a></li>
            <li class="onglet"><a href="index.php?controller=Contacts">Contacts</a></li>
        </ul>
    </header>
    <div class="ligneJaune"></div>
    <div class="main-content">
        <img src="/pinf2/resources/img/background/background.png" class="backgroundImage">

