<?php
class myami extends profil_user
{
    public function __construct($id)
    {
        parent::__construct($id);
        if ($this->isMyid($id) || !$this->isami($id, $_SESSION['id'])) {
            header("Location: ?");
        }
    }
    private function isMyid($id)
    {
        return $this->query("SELECT id FROM `utilisateurs` WHERE pseudo=:pseudo", array(
            ":pseudo" => array(
                "value" => $_SESSION['pseudo'],
                "type" => PDO::PARAM_INT
            )
        ))->fetch()['id'] == $id;
    }
}
