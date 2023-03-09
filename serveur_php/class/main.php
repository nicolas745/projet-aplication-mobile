<?php
class main
{
    public function __construct()
    {
        if ($this->isconnect()) {
            include("contenu_html/nav.php");
        } else {
            new connection();
        }
    }
    private function isconnect()
    {
        return isset($_SESSION['pseudo']);
    }
}
