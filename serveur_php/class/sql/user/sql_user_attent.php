<?php
class sql_user_attent extends sql_user
{
    public function __construct()
    {
        parent::__construct();
    }
    public function send_invitation(int $my, int $you)
    {
        if ($this->isattent($my, $you)) {
            $this->suprim_invit($my, $you);
            $sql_user_ami = new sql_user_ami();
            $sql_user_ami->addami($my, $you);
        } else {
            $this->query("INSERT INTO `ami_attent`(`id_receveur`, `id_send`) VALUES (:receveur, :sender)", array(
                ":receveur" => array(
                    'value' => $you,
                    'type' => pdo::PARAM_INT
                ),
                ":sender" => array(
                    "value" => $my,
                    "type" => pdo::PARAM_INT
                )
            ));
        }
    }
    public function isattent(int $my, int $your)
    {
        return !empty($this->query("SELECT * FROM `ami_attent` WHERE `id_receveur` = :receveur AND `id_send` = :sender", array(
            ":receveur" => array(
                'value' => $my,
                'type' => PDO::PARAM_INT
            ),
            ":sender" => array(
                "value" => $your,
                "type" => PDO::PARAM_INT
            )
        ))->fetch());
    }
    public function getlistattent(int $user)
    {
        return $this->query("SELECT ami_attent.*,utilisateurs.pseudo  FROM `ami_attent` INNER JOIN utilisateurs ON ami_attent.id_send=utilisateurs.id  WHERE ami_attent.id_receveur=:receveur", array(
            ":receveur" => array(
                "value" => $user,
                "type" => pdo::PARAM_INT
            )
        ))->fetchAll();
    }
    public function suprim_invit(int $my, int $you)
    {
        $this->query("DELETE FROM `ami_attent` WHERE `id_receveur` = :receveur AND `id_send` = :sender OR `id_receveur` = :sender2 AND `id_send` = :receveur2", array(
            ":receveur" => array(
                'value' => $my,
                'type' => PDO::PARAM_INT
            ),
            ":sender" => array(
                "value" => $you,
                "type" => PDO::PARAM_INT
            ),
            ":sender2" => array(
                "value" => $my,
                "type" => PDO::PARAM_INT
            ),
            ":receveur2" => array(
                "value" => $you,
                "type" => PDO::PARAM_INT
            )
        ));
    }
}
