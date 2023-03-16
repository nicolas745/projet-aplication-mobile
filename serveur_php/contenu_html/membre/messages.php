<h2>
    List des messages
</h2>
<lu>
    <?php
    $sql_messages =  new sql_messsages_list();
    $data = $sql_messages->listnewmessage();
    $button = new button();
    foreach ($data['newamis'] as $donner) {
        echo "<li>";
        echo "<p>" . $donner['pseudo'] . " veut etre ton ami?</p>";
        $button->addbuton("check.svg", function ($datauser) {
            $sql_user_attent = new sql_user_attent();
            $sql_user_attent->send_invitation($datauser['id_receveur'], $datauser['id_send']);
        }, $donner);
        $button->addbuton("times-circle.svg", function ($datauser) {
            $sql_user_attent = new sql_user_attent();
            $sql_user_attent->suprim_invit($datauser['id_receveur'], $datauser['id_send']);
            header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
        }, $donner);
        echo "</li>";
    }
    ?>
</lu>