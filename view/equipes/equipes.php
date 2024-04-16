<!DOCTYPE html>
<html>
<head>
    <title>Page d'équipe</title>
    <style>
        /* Ajoutez votre CSS ici */
    </style>
</head>
<body>
    <div class="sidebar">
        <?php foreach ($equipes as $equipe): ?>
            <a href="?equipe=<?php echo $equipe->id; ?>"><?php echo $equipe->nom; ?></a>
        <?php endforeach; ?>
    </div>

    <?php
    // Récupérez l'ID de l'équipe à partir de la requête
    $equipeId = $_GET['equipe'] ?? null;

    if ($equipeId) {
        // Si un ID d'équipe est fourni, récupérez uniquement les données pour cette équipe
        $joueurs = array_filter($joueurs, function($joueur) use ($equipeId) {
            return $joueur->equipeId == $equipeId;
        });

        $entrainements = array_filter($entrainements, function($entrainement) use ($equipeId) {
            return $entrainement->equipeId == $equipeId;
        });

        $matchs = array_filter($matchs, function($match) use ($equipeId) {
            return $match->equipeId == $equipeId;
        });
    }
    ?>

    <div class="content">
        <div class="players">
            <?php foreach ($joueurs as $joueur): ?>
                <div class="player">
                    <img src="<?php echo $joueur->photo_url; ?>">
                    <p><?php echo $joueur->nom; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <table class="trainings">
            <?php foreach ($entrainements as $entrainement): ?>
                <tr>
                    <td><?php echo $entrainement->date; ?></td>
                    <td><?php echo $entrainement->lieu; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="matches">
            <?php foreach ($matchs as $match): ?>
                <div class="match">
                    <p><?php echo $match->date; ?></p>
                    <p><?php echo $match->adversaire; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>