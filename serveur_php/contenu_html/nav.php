<?php
$buttons = array(
    "contact" => "media/contact.svg",
    "messages" => "media/messages-dots.svg",
    "rechecher" => "media/search.svg",
    "config" => "media/settings.svg"
);
echo "<nav>";
$button = "rechercher";
if (isset($_GET['Selectbutton'])) {
    $button =  $_GET['Selectbutton'];
}
foreach ($buttons as $key => $data) {
    if ($key == $button) {
        echo "<a class='svgYellow' href='?Selectbutton=$key'>";
        include($buttons[$key]);
        echo "</a>";
    } else {
        echo "<a href='?Selectbutton=$key'>";
        include($buttons[$key]);
        echo "</a>";
    }
}
echo "</nav>";
