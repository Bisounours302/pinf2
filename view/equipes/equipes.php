<head>
    <link rel="stylesheet" type="text/css" href="/pinf2/resources/css/equipes.css">
</head>

<div class="sidebar">
    <?php foreach ($tab_equipes as $equipe): ?>
        <a href="?controller=Equipes&equipe=<?php echo $equipe->id; ?>"><?php echo $equipe->nom; ?></a>
    <?php endforeach; ?>
</div>

<!-- AFFICHAGE DES JOUEURS DE L'EQUIPE -->

<div class="content">
    <!-- tableau entrainement format Lundi/Mardi/Mercredi/Jeudi/Vendrei -->
    <div class="entrainements">
    <h1><?php echo $tab_equipes[$idEquipe - 1]->nom; ?></h1>
    <?php $days = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"); ?>
    <table style="margin:0;background-color:gray;width:800px;border: 1px solid black;" cellspacing="0">
        <tr style="margin:0;"> 
        <h2 style="background-color:darkorange;margin:0;width:800px;text-align:center;border: 1px solid black;">Entrainements</h2>
        </tr>
        <tr style="background-color:purple;margin:0;width:100%;height:100%;">
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
        </tr style="margin:0;">
        <tr >
            <?php foreach ($days as $day): ?>
                <td style="width: 80px;text-align: center;">
                    <div style="word-wrap: break-word;overflow-wrap: break-word;width: 100%;">
                        <?php foreach ($tab_entrainements as $entrainement): ?>
                            <?php if ($entrainement->jour == $day): ?>
                                <?php echo $entrainement->heure_debut . "\n" . $entrainement->heure_fin . "\n" . $entrainement->lieu; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </td>
            <?php endforeach; ?>
        </tr>
        <?php if (isset($_SESSION['username'])): ?>
            <tr>
                <?php foreach ($days as $day): ?>
                    <td style="text-align: center">
                        <form action="?controller=Equipes&action=supprimerEntrainement" method="POST">
                            <input type="hidden" name="idEquipe" value="<?php echo $idEquipe; ?>">
                            <input type="hidden" name="jour" value="<?php echo $day; ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endif; ?>
    </table>
    </div>

    <div class="joueurs">
    <h2>Joueurs</h2>
    <table>
        <tr>
            <th></th>
            <?php if (isset($_SESSION['username'])): ?>
                <th>Action</th>
            <?php endif; ?>
        </tr>
        <tr>
        <?php $flag=0; ?>
        <?php foreach ($tab_joueurs as $joueur): ?>
            
                <td><img src="/pinf2/resources/img/joueurs/<?php echo $joueur->photo_url; ?>"
                        alt="Photo de <?php echo $joueur->prenom; ?>" style="width:100px;height:100px;"></td>
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- form de suppression -->
                    <td>
                    <form action="?controller=Equipes&action=supprimerJoueur" method="POST">
                        <input type="hidden" name="idEquipe" value="<?php echo $idEquipe; ?>">
                        <input type="hidden" name="idJoueur" value="<?php echo $joueur->id_joueur; ?>">
                        <input type="hidden" name="photo_url" value="<?php echo $joueur->photo_url; ?>">
                        <input type="submit" value="Supprimer">    
                    </form>
                    </td>
                <?php endif; ?>
                <?php $flag++; ?>
                <?php if($flag%4==0): ?>
                    </tr>
                    <tr>
                <?php endif; ?>
        <?php endforeach; ?>
        </tr>
    </table>
    </div>


    <div class="matches">
    <h2 style="background-color:darkorange;margin:0;width:400px;text-align:center;border: 1px solid black;">Matchs</h2>
    <table style="width:400px;background-color:gray;border:1px solid black;" cellspacing="0">
        <tr style="background-color:purple;">
            <th style="text-align: center;">Adversaire</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Lieu</th>
            <?php if (isset($_SESSION['username'])): ?>
                <th>Action</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($tab_matchs as $match): ?>
            <tr>
                <td style="text-align: center;"><?php echo $match->opposant; ?></td>
                <td style="text-align: center;"><?php echo $match->dateMatch; ?></td>
                <td style="text-align: center;"><?php echo $match->adresse; ?></td>
                <?php if (isset($_SESSION['username'])): ?>
                    <td>
                        <form action="?controller=Equipes&action=supprimerMatch" method="POST">
                        <input type="hidden" name="idEquipe" value="<?php echo $idEquipe; ?>">
                        <input type="hidden" name="idMatch" value="<?php echo $match->id; ?>">
                        <input type="submit" value="Supprimer">
                    </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    </div>
    <?php if (isset($_SESSION['username'])): ?>
        <div style="padding-left: 150px;">
        <h2>Ajouter un entraînement</h2>
        <form action="?controller=Equipes&action=ajouterEntrainement" method="POST">
            <!-- Ajouter les champs du formulaire ici -->
            <input type="hidden" name="idEquipe" value="<?php echo $idEquipe; ?>">
            <label for="jour">Jour</label>
            <!-- jour de la semaine sans entrainement -->
            <select name="jour" id="jour">
                <?php foreach ($days as $day): ?>
                    <?php $hasTraining = false; ?>
                    <?php foreach ($tab_entrainements as $entrainement): ?>
                        <?php if ($entrainement->jour == $day): ?>
                            <?php $hasTraining = true; ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if ($hasTraining): ?>
                        <option value="<?php echo $day; ?>" disabled><?php echo $day; ?>(Déjà entraînement)</option>
                    <?php else: ?>
                        <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <label for="heure_debut">Heure de début</label>
            <input type="time" name="heure_debut" id="heure_debut">
            <label for="heure_fin">Heure de fin</label>
            <input type="time" name="heure_fin" id="heure_fin">
            <label for="lieu">Lieu</label>
            <input type="text" name="lieu" id="lieu">
            <input type="submit" value="Ajouter">
        </form>

        <h2>Ajouter un joueur</h2>
        <form action="?controller=Equipes&action=ajouterJoueur" method="POST" enctype="multipart/form-data">
            <!-- Ajouter les champs du formulaire ici -->
            <input type="hidden" name="idEquipe" value="<?php echo $idEquipe; ?>">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
            <!-- ajout de la photo -->
            <label for="photo_url">Photo</label>
            <input type="file" name="photo_url" id="photo_url">
            <label for="entraineur">Entraineur</label>
            <select name="entraineur" id="entraineur" value="0">
                <option value="0">Non</option>
                <?php foreach ($tab_equipes as $equipe): ?>
                    <option value="<?php echo $equipe->id; ?>"><?php echo $equipe->nom; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Ajouter">
        </form>

        <h2>Ajouter un match</h2>
        <form action="?controller=Equipes&action=ajouterMatch" method="POST">
            <!-- Ajouter les champs du formulaire ici -->
            <input type="hidden" name="idEquipe" value="<?php echo $idEquipe; ?>">
            <label for="opposant">Adversaire</label>
            <input type="text" name="opposant" id="opposant">
            <label for="dateMatch">Date</label>
            <input type="date" name="dateMatch" id="dateMatch">
            <label for="adresse">Lieu</label>
            <input type="text" name="adresse" id="adresse">
            <input type="submit" value="Ajouter">
        </form>
        </div>
    <?php endif; ?>

    
