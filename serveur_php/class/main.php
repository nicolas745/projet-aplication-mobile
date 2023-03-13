<?php
class main
{
    public function __construct()
    {
        if ($this->isconnect()) {
            $this->membre();
            include("contenu_html/nav.php");
        } else {
            new connection();
        }
    }
    private function isconnect()
    {
        return isset($_SESSION['pseudo']);
    }
    private function membre()
    {
        include("contenu_html/membre/index.php");
    }
}
