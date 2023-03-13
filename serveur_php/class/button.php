<?php
class button
{
    public static array $list = array();
    public static function addbuton(string $url_img, callable $action, array $data)
    {
        $buton = array(
            "url" => $url_img,
            "function" => $action,
            "data" => $data
        );
        $postion = array_push(button::$list, $buton) - 1;
        button::post($postion);
        include("contenu_html/button.php");
    }
    public static function post($postion)
    {
        if (isset($_POST['id_button'])) {
            if ($postion == $_POST['id_button']) {
                button::$list[$postion]['function'](button::$list[$postion]['data']);
            }
        }
    }
}
