<?php
class sql_conection extends sql
{
    public string $pseudo;
    public string $password;
    public function __construct(string $pseudo, string $password)
    {
        parent::__construct();
        $this->pseudo = $pseudo;
        $this->password = sha1($password);
    }
    /**
     * look if compte is exist and password is correct
     */
    public function iscompteOK()
    {
        return $this->query("SELECT * FROM utilisateurs WHERE :a=:b OR :c=:d", array(
            ":a" => array(
                "value" => "pseudo",
                "type" => PDO::PARAM_STR,
            ),
            ":b" => array(
                "value" => $this->pseudo,
                "type" => PDO::PARAM_STR,
            ),
            ":c" => array(
                "value" => "password",
                "type" => PDO::PARAM_STR,
            ),
            ":d" => array(
                "value" => $this->password,
                "type" => PDO::PARAM_STR,
            )
        ));
    }
}
