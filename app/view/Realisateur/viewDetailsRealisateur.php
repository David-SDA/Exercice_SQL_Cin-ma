<?php
    ob_start();
?>

    <div class="info">
        <h2><?= $realisateur["prenom"] . " " . $realisateur["nom"] ?></h2>
        <h3>DÉTAILS</h3>
        <p><?= $realisateur["sexe"] ?></p>
        <p><?= $realisateur["date_naissance"] ?></p>
        <h3>FILMOGRAPHIE</h3>
        <?php
            foreach($filmsDansRealisateur as $films){
        ?>
            <p><a href="#" class="lienListe"><?= $films["titre"] ?></a></p>
        <?php        
            }
        ?>
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>