<p>pseudo : </p>
<?php new input(input::user, "text", "pseudo"); ?>
<p>mots de passe : </p>
<?php new input(input::eye_slash, "password", "password"); ?>
<p>Sex :</p>
<?php
foreach ($listSex as $data) {
    echo '<input type="radio" name="sexe" value="' . $data['id'] . '">';
    include("media/" . $data['url']);
}
?>
<p>E-mail</p>
<?php new input(input::email, "email", "email"); ?>
<button class="suivent" value='1'>Suivant</button>