<?php
function encrypt($data, $key)
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
$id_user = "ID_utilisateur";
$cle_secrete = "cle_secrete_pour_AES";
$message_crypte = encrypt($id_user, $cle_secrete);
echo "<script>var id = '" . $message_crypte . "';</script>";
