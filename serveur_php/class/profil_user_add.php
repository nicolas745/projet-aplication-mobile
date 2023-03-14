<?php
class profil_user_add extends profil_user
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        if ($id == $_SESSION['id'] || $this->isBlocked($_SESSION['id'], $id)) {
            header('Location: ?');
            return;
        }
        if ($this->isami($id, $_SESSION['id'])) {
            header('Location: ?Select=ami&id_ami=' . $id);
        }
    }
    public function actionclick($data)
    {
        $button = new button();
        if (!$this->isattent($_SESSION['id'], $_GET['id'])) {
            $button->addbuton("plus-circle.svg", function ($donner) {
                $this->actionadduser($donner);
            }, $data);
        }
    }
    public function actionadduser($donner)
    {
        if ($this->isBlocked($_SESSION['id'], $donner['id']) || $this->isattent($_SESSION['id'], $donner['id'])) return;
        $this->query("INSERT INTO `ami_attent`(`id_receveur`, `id_send`) VALUES (:receveur, :sender);            ", array(
            ":receveur" => array(
                'value' => $donner['id'],
                'type' => pdo::PARAM_INT
            ),
            ":sender" => array(
                "value" => $_SESSION['id'],
                "type" => pdo::PARAM_INT
            )
            header("Location:")
        ));
    }
}
