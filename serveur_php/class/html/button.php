<?php
class button extends icon
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
            if (isset(button::$list[$_POST['id_button']])) {
                if ($_POST['id_button'] == $postion) {
                    button::$list[$_POST['id_button']]['function'](button::$list[$_POST['id_button']]['data']);
                }
            }
        }
    }
}
