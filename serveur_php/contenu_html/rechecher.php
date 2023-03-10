<h2>RECHERCHE</h2>
<form>
    <?php
    new input(input::search, 'search', 'searchuser');
    $sql_user = new sql_user();
    $others = $sql_user->getOthers($_SESSION['pseudo']);
    echo "<lu>";
    foreach ($others as $data) {
        echo "<li><img><h3>" . $data['pseudo'] . "</h3><p>" . $data['description'] . "</p></li>";
    }
    echo "</lu>";
    ?>
</form>