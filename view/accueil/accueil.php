<?php
// FILEPATH: /var/www/html/pinf/views/home.php

// Début du code HTML
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <!-- style -->
    <link rel="stylesheet" href="/pinf2/resources/css/accueil.css">
    <!-- script -->
    <script src="/pinf2/resources/script/accueil.js" defer></script>
</head>
<body>
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Ceci est un exemple de page d'accueil.</p>
    <!-- Affichage des maths -->
    <h2>Matchs à venir</h2>
    <div class="match-container">
    <?php foreach($matchs as $index => $match): ?>
        <div class="match-slide <?php echo $index === 0 ? 'active' : ''; ?>">
            <div class="match-content">
                <h3>MATCH <?php echo $match->equipe?> : LILLERS vs <?php echo $match->opposant; ?></h3>
                <!-- Ecrire la date au format JOUR/MOIS/ANNEE -->
                <p>Date : <?php echo date('d/m/Y', strtotime($match->dateMatch)); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="arrow prev">&#8249;</div>
    <div class="arrow next">&#8250;</div>
</div>
</body>
</html>
<div class="fb-page" data-href="https://www.facebook.com/bclillers/" data-tabs="timeline" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/bclillers/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bclillers/">Basket Club Lillérois</a></blockquote></div>
<?php
// Fin du code HTML
?>
