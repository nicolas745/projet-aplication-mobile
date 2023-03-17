<?php
class Chiffrement
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encrypt($data)
    {
        $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($data, $cipher, $this->key, $options = OPENSSL_RAW_DATA, $iv);
        $ciphertext = base64_encode($iv . $ciphertext_raw);
        return $ciphertext;
    }

    public function decrypt($ciphertext)
    {
        $ciphertext = base64_decode($ciphertext);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
        $iv = substr($ciphertext, 0, $ivlen);
        $ciphertext = substr($ciphertext, $ivlen);
        $original_plaintext = openssl_decrypt($ciphertext, $cipher, $this->key, $options = OPENSSL_RAW_DATA, $iv);
        return $original_plaintext;
    }
}
