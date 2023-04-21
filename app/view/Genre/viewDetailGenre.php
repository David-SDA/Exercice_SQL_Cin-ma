<?php
    ob_start();
?>

    <div class="lister">
        <h1>Genre</h1>
        <ul>
            <li>test1</li>
            <li>test2</li>
        </ul>
    </div>

<?php
    $contenu = ob_get_clean();
    require "../template.php";
?>