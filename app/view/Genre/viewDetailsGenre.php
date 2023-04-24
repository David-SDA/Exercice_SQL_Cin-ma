<?php
    ob_start();
?>

    <div class="info">
        <?php
            $genre = $requeteGenre->fetch();
        ?>
        <h2><?= $genre["libelle"] ?></h2>
        <h3>LISTE DES FILMS QUI APPARTIENT À CE GENRE</h3>
        <?php
            foreach($requeteFilm->fetchAll() as $film){
        ?>
            <p><a href="#" class="lienListe"><?= $film["titre"] ?></a></p>
        <?php        
            }
        ?>
    </div>

<?php
    $titre = $genre["libelle"];
    $contenu = ob_get_clean();
    require("view/template.php");
?>