<?php
    ob_start();
?>

    <div class=formulaire>
        <h2>Ajouter un réalisateur</h2>
        <form enctype='multipart/form-data' action="index.php?action=ajouterRealisateur" method="post">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>
            
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">

            <label for="nom_realisateur">Sexe</label>
            <div>
                <input type="radio" name="sexe" id="Femme" value="Femme" checked>
                <label for="Femme">Femme</label>
            </div>
            <div>
                <input type="radio" name="sexe" id="Homme" value="Homme">
                <label for="Homme">Homme</label>
            </div>
            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" required>

            <input type="submit" name="submitRole" value="Ajouter le rôle">
        </form>
    </div>

<?php
    $titre = "Ajouter un rôle";
    $contenu = ob_get_clean();
    require("view/template.php");
?>