<?php
class input extends icon
{
    /**
     * @param const $url_image je veut les input::const
     */
    public function __construct($url_image, string $type, string $id)
    {
        include("contenu_html/input.php");
    }
}
