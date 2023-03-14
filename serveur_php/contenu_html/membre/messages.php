<h2>
    List des messages
</h2>
<lu>
    <?php
    $sql_messages =  new List_messages();
    $data = $sql_messages->listnewmessage();
    foreach ($data['newamis'] as $donner) {
        echo "<li>";
        echo print_r($donner);
        echo "</li>";
    }
    ?>
</lu>