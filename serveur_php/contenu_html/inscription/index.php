<main class="insc">
    <form method="post">
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
        if (empty($_GET['setup'])) {
            $_GET['setup'] = 0;
        }
        foreach ($files as $key => $file) {
            $style = '';
            if ($_GET['setup'] + 3 !== $key) {
                $style = 'style="display: none;"';
            }
            if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
                echo '<section class="inscription" ' . $style . '>';
                include("$dir/$file");
                buttons(count($files) - 3);
                echo "</section>";
            }
        }
        ?>
    </form>
</main>