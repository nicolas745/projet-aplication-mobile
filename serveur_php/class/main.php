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
        $button = "rechecher";
        if (isset($_GET['Selectbutton'])) {
            $button =  $_GET['Selectbutton'];
        }
        echo "<main>";
        switch ($button) {
            case "rechecher":
                include("contenu_html/rechecher.php");
            case "dd":
                break;
            default:
                break;
        }
        echo "</main>";
    }
}
