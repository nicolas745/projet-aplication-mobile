<main>
    <?php
    $dir = 'contenu_html/inscription'; // Mettez le chemin absolu de votre dossier ici
    $files = scandir($dir);
    function buttons($nb)
    {
        for ($i = 0; $i < $nb; $i++) {
            echo "<button>$i</button>";
        }
    }
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
            echo '<section id="' . $file . '">';
            include("$dir/$file");
            buttons(count($files) - 3);
            echo "</section>";
        }
    }
    ?>
    <script src="js/inscription.js"></script>
</main>