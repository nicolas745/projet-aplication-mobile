<?php
class profil_user extends sql_user
{
    public function __construct(int $id)
    {
        parent::__construct();
        $data = $this->query("SELECT * FROM utilisateurs INNER JOIN sex ON utilisateurs.id_sex=sex.id WHERE utilisateurs.id=:id", array(
            ":id" => array(
                "value" => $id,
                "type" => PDO::PARAM_INT
            )
        ))->fetch();
        print_r($data);
        if (empty($data)) return;
        $this->navuser($data);
        $this->actionclick($data);
    }
    public function isami(int $id)
    {
        $datami = array(
            ":ami1" => array(
                "value" => $id,
                "type" => pdo::PARAM_INT
            ),
            ":ami2" => array(
                "value" => $_SESSION['id'],
                "type" => pdo::PARAM_INT
            )
        );
        $is_ami1 = $this->query("SELECT id_ami1 FROM `listamie` WHERE (id_ami1=:ami1 AND id_ami2=:ami2 )", $datami)->fetch();
        if (!empty($is_ami1)) {
            return true;
        }
        $is_ami2 = $this->query("SELECT id_ami2 FROM `listamie` WHERE (id_ami2=:ami1 AND id_ami1=:ami2)   ", $datami)->fetch();
        if (!empty($is_ami2)) {
            return true;
        }
        return false;
    }
    public function navuser($data)
    {
        include("contenu_html/titre_add_user.php");
    }
    public function actionclick($data)
    {
    }
}
