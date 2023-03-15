<h2>
    List des messages
</h2>
<lu>
    <?php
    $sql_messages =  new List_messages();
    $data = $sql_messages->listnewmessage();
    $button = new button();
    foreach ($data['newamis'] as $donner) {
        echo "<li>";
        echo "<p>" . $donner['pseudo'] . " veut etre ton ami?</p>";
        $button->addbuton("check.svg", function ($data) {
            echo "dd";
        }, $donner);
        $button->addbuton("times-circle.svg", function ($data) {
            echo "aa";
        }, $donner);
        echo "</li>";
    }
    ?>
</lu>