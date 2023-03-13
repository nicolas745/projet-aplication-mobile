<?php
$buttons = array(
    "contact" => "media/contact.svg",
    "messages" => "media/message.svg",
    "rechecher" => "media/search.svg",
    "config" => "media/settings.svg"
);
echo "<nav>";
$button = "rechecher";
if (isset($_GET['Select'])) {
    $button =  $_GET['Select'];
}
foreach ($buttons as $key => $data) {
    if ($key == $button) {
        echo "<a class='svgYellow' href='?Select=$key'>";
        include($buttons[$key]);
        echo "</a>";
    } else {
        echo "<a href='?Select=$key'>";
        include($buttons[$key]);
        echo "</a>";
    }
}
echo "</nav>";
