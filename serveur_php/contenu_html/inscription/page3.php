<h2>like</h2>
<?php new input(input::search, "search", "seachjeux"); ?>
<ul class="jeux">
    <?php
    for ($i = 0; $i < 5 && $i < count($listjeux); $i++) {
        echo "<li actif='false'>";
        echo "<input type=checkbox name='jeux' value='" . $listjeux[$i]['url'] . "'><img src='" . $listjeux[$i]['url'] . "'>";
        echo "</li>";
    }
    ?>
</ul>
<button class="suivent" value="3">Suivant</button>