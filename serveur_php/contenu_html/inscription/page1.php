<p>pseudo : </p>
<input>
<p>mots de passe : </p>
<input type="password">
<p>Sex :</p>
<?php
foreach ($listSex as $data) {
    echo '<input type="radio" name="sexe" value="' . $data['id'] . '">';
    include("media/" . $data['url']);
}
?>
<p>E-mail</p>
<input type="mail">
<button class="Suivent">Suivent</button>