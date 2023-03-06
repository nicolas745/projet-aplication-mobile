<?php
class main
{
    public function __construct()
    {
        if ($this->isconnect()) {
            echo "dd";
        } else {
            new connection();
        }
    }
    private function isconnect()
    {
        return isset($_SESSION['user']);
    }
}
