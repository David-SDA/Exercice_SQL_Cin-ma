<?php
    ob_start();
?>

    <div class="info">
        <h2><?= $role["nom_role"] ?></h2>
        <h3>LISTE DES FILMS DANS LEQUEL CE RÔLE APPARAÎT</h3>
        <?php
            foreach($acteursDansRole as $acteur){
        ?>
            <p><a href="#" class="lienListe"><?= $acteur["titre"] ?></a>, joué par <a href ="#" class="lienListe"><?= $acteur["prenom"] ." " . $acteur["nom"] ?></a></p>
        <?php        
            }
        ?>
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>