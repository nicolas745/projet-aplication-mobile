<?php
$buttons = array(
    "contact" => icon::contact,
    "messages" => icon::message,
    "rechecher" => icon::search,
    "config" => icon::settings
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
