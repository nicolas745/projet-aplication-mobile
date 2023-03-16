<h2>List d'amis</h2>
<lu>
    <?php
    $sql_user_ami = new sql_user_ami();
    $list = $sql_user_ami->listami($_SESSION['id']);
    $button = new button();
    foreach ($list as $user) {
        echo "<li>";
        $button->addbuton(button::email, function () {
        }, array());
        echo "<p>" . $user['pseudo'] . "</p>";
        echo "</li>";
    }
    ?>
</lu>