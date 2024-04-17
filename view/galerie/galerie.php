<link rel="stylesheet" href="/pinf2/resources/css/galerie.css">
<script src="/pinf2/resources/script/galerie.js"></script>

<div class="sidebar">
    <ul class="nav">
        <?php for ($year = 2010; $year <= 2024; $year++): ?>
            <li class="nav-item">
                <a href="#" class="nav-link" data-year="<?php echo $year; ?>">
                    <?php echo $year; ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
<div class="tab-content">
    <?php
    for ($year = 2010; $year <= 2024; $year++): ?>
        <div class="tab-pane" data-year="<?php echo $year; ?>">
            <h2><?php echo $year; ?></h2>
            <?php
            $currentTeam = null;
            $hasImages = false;
            foreach ($images as $photo):
                if ($photo->annee == $year):
                    $hasImages = true;
                    if ($currentTeam != $photo->nom): ?>
                        <h3><?php echo $photo->nom; ?></h3>
                        <?php $currentTeam = $photo->nom; ?>
                    <?php endif; ?>
                    <img
                        src="/pinf2/resources/img/galerie/<?php echo $photo->annee; ?>/<?php echo $photo->nom; ?>/<?php echo $photo->photo_url; ?>">
                    <?php if (isset($_SESSION['username'])): ?>
                        <form action="index.php?controller=Galerie&action=supprimerPhoto" method="post">
                            <input type="hidden" name="photo_id" value="<?php echo $photo->id; ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$hasImages): ?>
                <p>Aucune photo pour cette année</p>
            <?php endif; ?>
        </div>
    <?php endfor; ?>


    <?php if (isset($_SESSION['username'])): ?>
        <form action="index.php?controller=Galerie&action=ajouterPhoto" method="post" enctype="multipart/form-data">
            <label for="annee">Année:</label>
            <select id="annee" name="annee" required>
                <?php for ($year = 2010; $year <= 2024; $year++): ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endfor; ?>
            </select><br><br>
            <label for="equipe">Equipe:</label>
            <select id="equipe" name="equipe" required>
                <?php foreach ($equipes as $equipe): ?>
                    <option value="<?php echo $equipe->id . ',' . $equipe->nom; ?>"><?php echo $equipe->nom; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" required><br><br>
            <input type="submit" value="Ajouter">
        </form>
    <?php endif; ?>