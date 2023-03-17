<h2>RECHERCHE</h2>
<form action="dd">
    <?php
    new input(input::search, 'search', 'searchuser');
    $sql_user = new sql_user();
    $others = $sql_user->getOthers($_SESSION['pseudo']);
    echo "<ul>";
    foreach ($others as $data) {
        echo "<li><a href='?Select=adduser&id=" . $data['id'] . "'><img><h3>" . $data['pseudo'] . "</h3><p>" . $data['description'] . "</p></a></li>";
    }
    echo "</ul>";
    ?>
</form>