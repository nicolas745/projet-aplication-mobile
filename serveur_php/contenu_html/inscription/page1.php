<p>pseudo : </p>
<?php new input(input::user, "text"); ?>
<p>mots de passe : </p>
<?php new input(input::eye_slash, "password"); ?>
<p>Sex :</p>
<?php
foreach ($listSex as $data) {
    echo '<input type="radio" name="sexe" value="' . $data['id'] . '">';
    include("media/" . $data['url']);
}
?>
<p>E-mail</p>
<?php new input(input::email, "email"); ?>
<button class="Suivent">Suivent</button>