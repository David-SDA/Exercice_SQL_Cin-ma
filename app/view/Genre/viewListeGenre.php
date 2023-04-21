<?php
    ob_start();
?>

    <div class="tableau">
        <table>
            <thead>
                <th>LISTE DES GENRES</th>
            </thead>
            <tbody>
                <?php
                    foreach($genres as $genre){
                ?>
                    <tr>
                        <td><a href="" class="lienListe"><?= $genre["libelle"] ?></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
    $contenu = ob_get_clean();
    require("view/template.php");
?>