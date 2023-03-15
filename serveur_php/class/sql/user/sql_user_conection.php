<?php
class sql_user_conection extends sql_user
{
    public string $pseudo;
    public string $password;
    public int $id;
    public string $email;
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
        $query = $this->query("SELECT * FROM utilisateurs WHERE pseudo=:user OR password=:pass", array(
            ":user" => array(
                "value" => $this->pseudo,
                "type" => PDO::PARAM_STR,
            ),
            ":pass" => array(
                "value" => $this->password,
                "type" => PDO::PARAM_STR,
            )
        ));
        $data = $query->fetch();
        if (empty($data)) return false;
        $this->id = $data['id'];
        $this->email = $data['e_mail'];
        return $query->rowCount() != 0;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getmail()
    {
        return $this->email;
    }
}
