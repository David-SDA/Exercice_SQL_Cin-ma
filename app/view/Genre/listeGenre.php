<?php
    ob_start();
?>

    <div class="tableau">
        <table>
            <thead>
                <th>LISTE DES GENRES</th>
            </thead>
            <tbody>
                <tr>
                    <td>Genre 1</td>
                </tr>
                <tr>
                    <td>Genre 2</td>
                </tr>
            </tbody>
        </table>
    </div>

<?php
    $contenu = ob_get_clean();
    require "../template.php";
?>