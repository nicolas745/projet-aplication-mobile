<?php
class sql_user extends sql
{
    public function __construct()
    {
        parent::__construct();
    }
    public function adduser(string $user, string $password, string $email, int $sex)
    {
        $password = sha1($password);
        $this->query("INSERT INTO `utilisateurs`(`pseudo`, `e_mail`, `password`, `id_sex`) VALUES (:pseudo,:email,:passw,:sex)", array(
            ":pseudo" => array(
                "value" => $user,
                "type" => PDO::PARAM_STR
            ),
            ":passw" => array(
                "value" => $password,
                "type" => PDO::PARAM_STR
            ),
            ":sex" => array(
                "value" => $sex,
                "type" => PDO::PARAM_INT
            ),
            ":email" => array(
                "value" => $email,
                "type" => PDO::PARAM_STR
            )
        ));
    }
    public function notexists(String $user, string $email)
    {
        return $this->query("SELECT * FROM `utilisateurs` WHERE e_mail=:email OR pseudo=:pseudo", array(
            ":email" => array(
                "value" => $email,
                "type" => PDO::PARAM_STR
            ),
            ":pseudo" => array(
                "value" => $user,
                "type" => PDO::PARAM_STR
            )
        ))->rowCount() == 0;
    }
    public function getOthers($my)
    {
        return $this->query("SELECT * FROM `utilisateurs` WHERE pseudo!=:pseudo LIMIT 10", array(
            ":pseudo" => array(
                "value" => $my,
                "type" => PDO::PARAM_STR
            )
        ))->fetchAll();
    }
}
