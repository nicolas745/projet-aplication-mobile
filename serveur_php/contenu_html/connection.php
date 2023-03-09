<main>
    <h1>nuntius game</h1>
    <?php
    include("media/logo.svg")
    ?>
    <form method="POST" action="">
        <p>pseudo</p>
        <?php new input(input::user, "text"); ?>
        <p>mots de passe</p>
        <?php new input(input::eye_slash, "password"); ?>
        <input type="submit" class="borderyellow" name="inscription" value="s'inscrire">
        <input type="submit" class="backgroundyellow" name="connection" value="se connecter">
        <input type="submit" class="borderwhite" name="pass" value="Mots de passe oubier">
    </form>
</main>