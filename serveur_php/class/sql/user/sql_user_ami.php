<?php
class sql_user_ami extends sql_user
{
    public function __construct()
    {
        parent::__construct();
    }
    public function addami(int $my, int $you)
    {
        // Vérification que le lien n'existe pas déjà
        if ($this->isami($my, $you)) {
            return;
        }

        $this->query("INSERT INTO `listamie`(`id_ami1`, `id_ami2`) VALUES (:ami1, :ami2)", array(
            ":ami1" => array(
                'value' => $my,
                'type' => PDO::PARAM_INT
            ),
            ":ami2" => array(
                "value" => $you,
                "type" => PDO::PARAM_INT
            )
        ));
    }
    public function listami(int $id)
    {

        return $this->query("SELECT utilisateurs.* FROM `listamie` INNER JOIN utilisateurs ON listamie.id_ami1=utilisateurs.id OR listamie.id_ami2=utilisateurs.id WHERE (listamie.id_ami1=:id or listamie.id_ami2=:id2) AND utilisateurs.id!=:id3;", array(
            ":id" => array(
                "value" => $id,
                "type" => PDO::PARAM_INT
            ),
            ":id2" => array(
                "value" => $id,
                "type" => PDO::PARAM_INT
            ),
            ":id3" => array(
                "value" => $id,
                "type" => PDO::PARAM_INT
            )
        ))->fetchAll();
    }
    public function isami(int $my, int $you)
    {
        $result = $this->query("SELECT * FROM `listamie` WHERE (`id_ami1` = :my1 AND `id_ami2` = :you1) OR (`id_ami1` = :you2 AND `id_ami2` = :my2)", array(
            ":my1" => array(
                'value' => $my,
                'type' => PDO::PARAM_INT
            ),
            ":you1" => array(
                "value" => $you,
                "type" => PDO::PARAM_INT
            ),
            ":my2" => array(
                'value' => $my,
                'type' => PDO::PARAM_INT
            ),
            ":you2" => array(
                "value" => $you,
                "type" => PDO::PARAM_INT
            )
        ))->fetchColumn();

        return ($result != 0);
    }
}
