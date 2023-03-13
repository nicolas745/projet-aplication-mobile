<?php
class myami extends profil_user
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        if ($this->isMyid($id)) {
            header("Location: ?");
        } else if ($this->ismyami($id)) {
        }
    }
    private function isMyid(int $id)
    {
        return $this->query("SELECT id FROM `utilisateurs` WHERE pseudo=:pseudo", array(
            ":pseudo" => array(
                "value" => $_SESSION['pseudo'],
                "type" => PDO::PARAM_INT
            )
        ))->fetch()['id'] == $id;
    }
    private function ismyami(int $id)
    {
        return false;
    }
}
