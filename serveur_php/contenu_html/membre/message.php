<script>
    my = <?php echo $_SESSION['id']; ?>;
    key = "<?php
            $chiffrement = new chiffrement();
            echo $chiffrement->encrypt($_SESSION['id'], "16b0fa40cdd34bbf92ae41f7dda24681a7dc2665ea689a009dbd14343709ec00");
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