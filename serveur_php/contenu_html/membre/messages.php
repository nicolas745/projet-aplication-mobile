<h2>
    List des messages
</h2>
<lu>
    <?php
    $sql_messages =  new sql_messsages_list();
    $data = $sql_messages->listnewmessage();
    $button = new button();
    $sql_attent = new sql_attent();
    foreach ($data['newamis'] as $donner) {
        echo "<li>";
        echo "<p>" . $donner['pseudo'] . " veut etre ton ami?</p>";
        $button->addbuton("check.svg", function ($data) {
        }, $donner);
        $button->addbuton("times-circle.svg", function ($data) {
        }, $donner);
        echo "</li>";
    }
    ?>
</lu>