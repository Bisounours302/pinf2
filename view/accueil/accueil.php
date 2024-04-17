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
<div class="container">
    <!-- Affichage des maths -->
    <div class="matchs">
        <h2 >Matchs à venir</h2>
        <div class="match-container">
            <?php foreach ($matchs as $index => $match): ?>
                <div class="match-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="match-content">
                        <h2>MATCH <?php echo $match->nom ?></h3>
                        <h3>BC LILLERS vs <?php echo $match->opposant; ?></h1>
                        <!-- Ecrire la date au format JOUR/MOIS/ANNEE -->
                        <p>Date : <?php echo date('d/m/Y', strtotime($match->dateMatch)); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="arrow prev">&#8249;</div>
            <div class="arrow next">&#8250;</div>
        </div>
    </div>
    <div class="facebook">
        <div class="fb-page" data-href="https://www.facebook.com/bclillers/" data-tabs="timeline" data-width="250"
            data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
            data-show-facepile="false">
            <blockquote cite="https://www.facebook.com/bclillers/" class="fb-xfbml-parse-ignore"><a
                    href="https://www.facebook.com/bclillers/">Basket Club Lillérois</a></blockquote>
        </div>
    </div>
    <div class="sponsors">

    </div>
</div>