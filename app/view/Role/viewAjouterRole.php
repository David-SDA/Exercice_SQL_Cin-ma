<?php
    ob_start();
?>

    <!-- Formulaire d'ajout d'un rôle -->
    <div class=formulaire>
        <h2>Ajouter un rôle</h2>
        <form enctype='multipart/form-data' action="index.php?action=ajouterRole" method="post">
            <label for="nom_role">Nom du rôle</label>
            <input type="text" name="nom_role" id="nom_role" required>
            <input type="submit" name="submitRole" value="Ajouter le rôle">
        </form>
    </div>

<?php
    $titre = "Ajouter un rôle";
    $contenu = ob_get_clean();
    require("view/template.php");
?>