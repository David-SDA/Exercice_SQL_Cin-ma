<?php
    ob_start();
?>

    <div class=formulaire>
        <h2>Ajouter un réalisateur</h2>
        <form enctype='multipart/form-data' action="index.php?action=ajouterRealisateur" method="post">
            <label for="prenom" class="nomChamp">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
            
            <label for="nom" class="nomChamp">Nom :</label>
            <input type="text" name="nom" id="nom">

            <label for="sexe" class="nomChamp">Sexe :</label>
            <div>
                <input type="radio" name="sexe" id="Femme" value="Femme" checked>
                <label for="Femme">Femme</label>
            </div>
            <div>
                <input type="radio" name="sexe" id="Homme" value="Homme">
                <label for="Homme">Homme</label>
            </div>
            <label for="date_naissance" class="nomChamp">Date de naissance :</label>
            <input type="date" name="date_naissance" id="date_naissance" required>
            <div class="nomChamp">
                <label for="estActeur">Est-il aussi acteur ?</label>
                <input type="radio" name="estActeur" id="Oui" value="Oui">
                <label for="Oui">Oui</label>
                <input type="radio" name="estActeur" id="Non" value="Non" checked>
                <label for="Non">Non</label>
            </div>

            <input type="submit" name="submitRealisateur" value="Ajouter le réalisateur">
        </form>
    </div>

<?php
    $titre = "Ajouter un rôle";
    $contenu = ob_get_clean();
    require("view/template.php");
?>