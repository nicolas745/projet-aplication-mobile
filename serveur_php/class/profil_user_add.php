<?php
class profil_user_add extends profil_user
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        if ($this->isami($id)) {
            header('Location: ?Select=ami&id_ami=' . $id);
        }
    }
    public function actionclick($data)
    {
        $button = new button();
        $button->addbuton("plus-circle.svg", function () {
        }, $data);
    }
}
