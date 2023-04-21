<?php
    ob_start();
?>

    <div class="info">
        <h2><?= $genre["libelle"] ?></h2>
        <h3>LISTE DES FILMS QUI APPARTIENT À CE GENRE</h3>
        <?php
            foreach($filmsDansGenre as $film){
        ?>
            <p>- <?= $film["titre"] ?></p>
        <?php        
            }
        ?>
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>