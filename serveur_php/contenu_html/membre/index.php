<main>
    <?php
    if (empty($_GET['Select'])) {
        $_GET['Select'] = "rechecher";
    }
    $dir = 'contenu_html/membre/';
    $files = scandir($dir);
    foreach ($files as $key => $file) {
        $style = '';
        if ($_GET['Select'] . ".php" !== $file) {
            $style = 'style="display: none;"';
        }
        if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
            echo '<section select="' . str_replace(".php", "", $file) . '" class="membre" ' . $style . '>';
            include("$dir/$file");
            echo "</section>";
        }
    }
    ?>
</main>