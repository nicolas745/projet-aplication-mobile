<main>
    <?php
    $dir = 'contenu_html/inscription'; // Mettez le chemin absolu de votre dossier ici
    $files = scandir($dir);
    function buttons($nb)
    {
        echo "<article>";
        for ($i = 0; $i < $nb; $i++) {
            echo "<button class='page$i select'></button>";
        }
        echo "</article>";
    }
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
            echo '<section class="inscription">';
            include("$dir/$file");
            buttons(count($files) - 3);
            echo "</section>";
        }
    }
    ?>
    <script src="js/inscription.js" type="module"></script>
</main>