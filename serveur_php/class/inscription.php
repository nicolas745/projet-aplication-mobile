<?php
class inscription
{
    public function __construct()
    {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['sexe'])) {
                $password = $_POST['password'];
                $user = htmlspecialchars(trim($_POST['pseudo']));
                $email = htmlspecialchars(trim($_POST['email']));
                $sex = intval($_POST['sexe']);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $sql_user = new sql_user();
                    if ($sql_user->notexists($user, $email)) {
                        $sql_user->adduser($user, $password, $email, $sex);
                        $_SESSION['pseudo'] = $user;
                        header("Location: " . $_SERVER['REQUEST_URI']);
                    }
                }
            }
        } else {
        }
    }
}
