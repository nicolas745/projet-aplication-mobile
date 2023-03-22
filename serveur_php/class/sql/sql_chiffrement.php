<?php
class sql_Chiffrement extends sql
{
    private $key;
    public $crypt;
    public function __construct($key)
    {
        $this->key = $key;
        parent::__construct();
    }

    public function encrypt($data)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-gcm'));
        $tag = "key";
        $encrypted = openssl_encrypt($data, 'aes-256-gcm', $this->key, 0, $iv, $tag);
        $this->crypt = base64_encode($encrypted) . '::' . base64_encode($iv) . '::' . base64_encode($tag);
        return $this->crypt;
    }
    public function savesql(int $user)
    {
        $existingRow = $this->query("SELECT * FROM keypriver WHERE id_user = :userid;", array(
            ":userid" => array(
                "value" => $user,
                "type" => pdo::PARAM_INT
            )
        ))->fetch();

        if ($existingRow) {
            $this->query("UPDATE keypriver SET userkey = :userkey WHERE id_user = :userid;", array(
                ":userid" => array(
                    "value" => $user,
                    "type" => pdo::PARAM_INT
                ),
                ":userkey" => array(
                    "value" => $this->crypt,
                    "type" => pdo::PARAM_STR
                )
            ));
        } else {
            $this->query("INSERT INTO keypriver (id_user, userkey) VALUES (:userid, :userkey);", array(
                ":userid" => array(
                    "value" => $user,
                    "type" => pdo::PARAM_INT
                ),
                ":userkey" => array(
                    "value" => $this->crypt,
                    "type" => pdo::PARAM_STR
                )
            ));
        }
    }
}
