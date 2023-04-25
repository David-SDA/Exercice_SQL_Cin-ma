<?php
    ob_start();
?>

    <div class="messageAjout">test</div>

<?php
    $titre = "Accueil";
    $contenu = ob_get_clean();
    require("view/template.php");
?>