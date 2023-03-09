<h2>Platforme</h2>
<?php new input(input::search, "search", "searchplatforme"); ?>
<ul>
    <?php
    for ($i = 0; $i < 5 && $i < count($listPlatforme); $i++) {
        echo "<li>";
        echo "<input>";
        echo "<p>" . $listPlatforme[$i]['nom'] . "</p>";
        echo "</li>";
    }
    ?>
</ul>
<button>Suivant</button>