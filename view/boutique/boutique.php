<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/pinf2/resources/css/boutique.css">
</head>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="container">
<?php foreach ($articles as $article): ?>
    <div class="article">
        <div class="infos">
        <h2><?php echo $article->nom; ?></h2>
        <p><?php echo $article->description; ?></p>
        <p><?php echo $article->prix; ?>€</p>
        
       
        
        <?php if (isset($_SESSION['username'])): ?>
            <form action="index.php?controller=Boutique&action=supprimerArticle" method="post">
                <input type="hidden" name="article_id" value="<?php echo $article->id; ?>">
                <input type="hidden" name="photo_url" value="<?php echo $article->photo_url; ?>">
                <input type="submit" value="Supprimer">
            </form>
        <?php endif; ?>
        </div>
        <!-- afficher l'image de l'article -->
        <img class="imgArticle" src="/pinf2/resources/img/boutique/<?php echo $article->photo_url; ?>" alt="image de l'article">
        <!-- Affichez les autres propriétés comme vous le souhaitez -->

    </div>
<?php endforeach; ?>
</div>
<?php if (isset($_SESSION['username'])): ?>
    <h2>Ajouter un nouvel article</h2>
    <form action="index.php?controller=Boutique&action=ajtArticle" method="post" enctype="multipart/form-data">
        <label for="nom">Nom de l'article:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" required><br><br>
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" required><br><br>
        <input type="submit" value="Ajouter">
    </form>
<?php endif; ?>