<h2>Platforme</h2>
<?php new input(input::search, "search", "searchplatforme"); ?>
<ul>
    <?php
    for ($i = 0; $i < 5 && $i < count($listPlatforme); $i++) {
        echo "<li>";
        echo "<p><input type='checkbox' name='platforme[]' value=" . $listPlatforme[$i]['nom'] . ">" . $listPlatforme[$i]['nom'] . "</p>";
        echo "</li>";
    }
    ?>
</ul>
<button class="suivent" value='2'>Suivant</button>