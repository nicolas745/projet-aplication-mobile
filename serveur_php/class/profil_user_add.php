<?php
class profil_user_add extends profil_user
{
    public function __construct(int $id)
    {
        parent::__construct($id);
        $datami = array(
            ":ami1" => array(
                "value" => $id,
                "type" => pdo::PARAM_INT
            )
        );
        $is_ami1 = $this->query("SELECT id_ami1 FROM `listamie` WHERE (id_ami1=:ami1)", $datami)->fetch();
        if (!empty($is_ami1)) {
            header('Location: ?Select=ami&id_ami=' . $is_ami1['id_ami1']);
            return;
        }
        $is_ami2 = $this->query("SELECT id_ami2 FROM `listamie` WHERE (id_ami2=:ami1)   ", $datami)->fetch();
        if (!empty($is_ami2)) {
            header('Location: ?Select=ami&id_ami=' . $is_ami2['id_ami2']);
            return;
        }
    }
    public function actionclick($data)
    {
        $button = new button();
        $button->addbuton("plus-circle.svg", function () {
        }, $data);
    }
}
