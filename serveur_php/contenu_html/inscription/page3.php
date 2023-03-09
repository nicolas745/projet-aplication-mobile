<h2>like</h2>
<input>
<ul class="jeux">
    <?php
    for ($i = 0; $i < 5 && $i < count($listjeux); $i++) {
        echo "<li actif='false'>";
        echo "<img src='" . $listjeux[$i]['url'] . "'>";
        echo "</li>";
    }
    ?>
</ul>
<button>Suivent</button>