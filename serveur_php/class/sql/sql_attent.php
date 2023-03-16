<?php
class sql_attent extends sql
{
    public function __construct()
    {
        parent::__construct();
    }
    public function send_invitation(int $my, int $you)
    {
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
    public function refus_invit($my, $you)
    {
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
