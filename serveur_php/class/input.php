<?php
class input
{
    public const user = "media/user-alt.svg";
    public const eye_slash = "media/eye-slash.svg";
    public const email = "media/email.svg";
    public const search = "media/search.svg";
    /**
     * @param const $url_image je veut les input::const
     */
    public function __construct($url_image, string $type)
    {
        include("contenu_html/input.php");
    }
}
