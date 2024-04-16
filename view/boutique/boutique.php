
<!DOCTYPE html>
PAGE BOUTIQUE

<?php
foreach($articles as $article): ?>
    <h2><?php echo $article->nom; ?></h2>
    <p><?php echo $article->description; ?></p>
    <!-- afficher l'image de l'article -->
    <img src="/pinf2/resources/img/boutique/<?php echo $article->photo_url; ?>" alt="image de l'article">
    <!-- Affichez les autres propriétés comme vous le souhaitez -->
<?php endforeach; ?>
