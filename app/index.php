<?php
    ob_start();
?>

    <div>test1</div>

<?php
    $contenu = ob_get_clean();
    require "view/template.php";
?>