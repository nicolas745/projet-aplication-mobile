<?php
class connection
{
    public function __construct()
    {
        if ($this->isinput()) {
        }
        include("contenu_html/connection.php");
    }
    /**
     * ca verifier tout les champer pour se connecter
     */
    private function isinput()
    {
        if (!isset($_POST['user'])) return false;
        if (!isset($_POST['password'])) return false;
        return true;
    }
}
