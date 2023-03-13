<?php
class button
{
    public static array $list = array();
    public static function addbuton(string $url_img, callable $action, $data)
    {
        $buton = array(
            "url" => $url_img,
            "function" => $action,
            "data" => $data
        );
        $postion = array_push(button::$list, $buton) - 1;
        include("contenu_html/button.php");
    }
}
