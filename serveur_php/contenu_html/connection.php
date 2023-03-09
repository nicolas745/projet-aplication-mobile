<main>
    <h1>nuntius game</h1>
    <?php
    include("media/logo.svg")
    ?>
    <form method="POST" action="">
        <p>pseudo</p>
        <?php new input(input::user, "text", "pseudo"); ?>
        <p>mots de passe</p>
        <?php new input(input::eye_slash, "password", "password"); ?>
        <a type="submit" class="borderyellow" href="?inscription">s'inscrire</a>
        <input type="submit" class="backgroundyellow" name="connection" value="connection">
        <a type="submit" class="borderwhite" name="pass" value="">Mots de passe oubier</a>
    </form>
</main>