<?php
include('contenu_html/configretour.php');
echo "<form>";
echo "<p>E-mail</p>";
new input(input::email, "mail", "email");
echo "<p>pseudo</p>";
new input(input::user, "text", "pseudo");
echo "<p>password</p>";
new input(input::eye_slash, "password", "password");
echo "<a>Suprimer</a>";
echo "<a href='?deconection'>deconection</a>";
echo "</from>";
