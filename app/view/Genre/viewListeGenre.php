<?php
    ob_start();
    require "../../model/Genre/modelListeGenre.php";
?>

    <div class="tableau">
        <table>
            <thead>
                <th>LISTE DES GENRES</th>
            </thead>
            <tbody>
                <?php
                    foreach($genres as $g){
                ?>
                    <tr>
                        <td><a href="#"><?= $g["libelle"] ?></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
    $contenu = ob_get_clean();
    require "../template.php";
?>