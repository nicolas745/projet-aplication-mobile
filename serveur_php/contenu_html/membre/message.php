<script>
    my = <?php echo $_SESSION['id']; ?>;
    key = "<?php
            $chiffrement = new sql_chiffrement("f7d6a14b9bbe67750ddae579a8ee0136071159e2f80da6e09ead3ecc3795405e");
            echo $chiffrement->encrypt($_SESSION['id']);
            $chiffrement->savesql($_SESSION['id']);
            ?>";
</script>
<h2>lsl</h2>
<article id="convers">ss</article>
<form method="post">
    <fieldset>
        <textarea name="message" id="text"></textarea>
        <button id="message">
            <?php include(icon::message); ?>
        </button>
    </fieldset>
</form>