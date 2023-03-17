<?php
class addami extends sql_user_profil
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        if ($id == $_SESSION['id'] || $this->isBlocked($_SESSION['id'], $id)) {
            header('Location: ?');
            return;
        }
        if ($this->isami($id, $_SESSION['id']) && $_GET['Select'] == "ami") {
            header('Location: ?Select=ami&id_ami=' . $id);
        }
    }
    public function actionclick($data)
    {
        $button = new button();
        if (!$this->isattent($_SESSION['id'], $_GET['id'])) {
            $button->addbuton(button::plus_circle, function ($donner) {
                print_r($donner);
                $this->actionadduser($donner);
            }, $data);
        }
    }
    public function actionadduser($donner)
    {
        if (!$this->isBlocked($_SESSION['id'], $donner['id']) && !$this->isattent($_SESSION['id'], $donner['id'])) {
            $sql_user_attent = new sql_user_attent();
            $sql_user_attent->send_invitation($_SESSION['id'], $donner['id']);
            header('Location: ' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
            exit;
        }
    }
}
