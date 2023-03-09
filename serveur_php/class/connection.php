<?php
class connection
{
    private  string $pseudo;
    private string $password;
    public function __construct()
    {
        if (isset($_GET['inscription'])) {
            $sql_sex = new sql_sex();
            $listSex = $sql_sex->getList();
            $sql_platforme = new sql_platforme();
            $listPlatforme = $sql_platforme->getList();
            $sql_jeux = new sql_jeux();
            $listjeux = $sql_jeux->getList();
            include("contenu_html/inscription/index.php");
            exit();
        }
        if ($this->ckeckinputs()) {
            $sql_conection = new sql_conection($this->pseudo, $this->password);
            if ($sql_conection->iscompteOK()) {
                $_SESSION['pseudo'] = $this->pseudo;
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit;
            }
        }
        include("contenu_html/connection.php");
    }
    /**
     * ckeck if inputs is empty and !isset
     */
    private function ckeckinputs()
    {
        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) return false;
        if (!isset($_POST['password']) || empty($_POST['password'])) return false;
        if (!isset($_POST['connection'])) return false;
        $this->pseudo = $_POST['pseudo'];
        $this->password = $_POST['password'];
        return true;
    }
}
