<?php
    ob_start();
?>

    <div class="info">
        <?php
           $acteur = $requeteActeur->fetch();
        ?>
        <h2><?= $acteur["prenom"] . " " . $acteur["nom"] ?></h2>
        <h3>DÉTAILS</h3>
        <p><?= $acteur["sexe"] ?></p>
        <p class="ligne"><?= $acteur["date_naissance"] ?></p>
        <h3>FILMOGRAPHIE</h3>
        <?php
            foreach($requeteFilms->fetchAll() as $film){
        ?>
            <p><a href="#" class="lienListe"><?= $film["titre"] ?></a></p>
        <?php        
            }
        ?>
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>