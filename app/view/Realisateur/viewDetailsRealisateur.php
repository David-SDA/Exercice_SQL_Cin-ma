<?php
    ob_start();
?>

    <!-- Affichage des détails d'un réalisateur -->
    <div class="info">
        <?php
            $realisateur = $requeteRealisateur->fetch();
        ?>
        <h2><?= $realisateur["prenom"] . " " . $realisateur["nom"] ?></h2>
        <h3>DÉTAILS</h3>
        <p><?= $realisateur["sexe"] ?></p>
        <p class="ligne"><?= $realisateur["date_naissance"] ?></p>
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
    $titre = $realisateur["prenom"] . " " . $realisateur["nom"];
    $contenu = ob_get_clean();
    require("view/template.php");
?>