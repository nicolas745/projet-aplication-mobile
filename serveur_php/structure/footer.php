<?php
if (isset($_SESSION["id"])) {
    echo '<script src="js/membre.js"></script>';
} else {
    echo '<script src="js/inscription.js"></script>';
}
?>
</body>

</html>