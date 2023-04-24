<?php
    ob_start();
?>

    <div class="info">
        <?php
            $role = $requeteRole->fetch();
        ?>
        <h2><?= $role["nom_role"] ?></h2>
        <h3>LISTE DES FILMS DANS LEQUEL CE RÔLE APPARAÎT</h3>
        <?php
            foreach($requeteActeur as $acteur){
        ?>
            <p><a href="#" class="lienListe"><?= $acteur["titre"] ?></a>, joué par <a href ="#" class="lienListe"><?= $acteur["prenom"] ." " . $acteur["nom"] ?></a></p>
        <?php        
            }
        ?>
    </div>

<?php
    $titre = $role["nom_role"];
    $contenu = ob_get_clean();
    require("view/template.php");
?>