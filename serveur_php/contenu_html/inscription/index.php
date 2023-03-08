<?php
function buttons()
{
?>
    <div>
        <button class="Suivent"></button>
        <button class="Suivent"></button>
        <button class="Suivent"></button>
        <button class="Suivent"></button>
    </div>
<?php
}
?>
<main>
    <section id="page1">
        <p>pseudo : </p>
        <input>
        <p>mots de passe : </p>
        <input>
        <p>Sex :</p>
        <div>
            <input type="radio" name="sexe" value="garcon">
            <?php include("media/garcon.svg"); ?>
            <input type="radio" name="sexe" value="fille">
            <?php include("media/fille.svg"); ?>
            <input name="sexe" value="nobinaire" type="radio">
            <?php include("media/nonbinaire.svg"); ?>
        </div>
        <p>E-mail</p>
        <input>
        <button class="Suivent">Suivent</button>
        <?php buttons(); ?>
    </section>
    <script src="js/inscription.js"></script>
</main>