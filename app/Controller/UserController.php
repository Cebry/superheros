<?php

namespace App\Controller;

use App\Models\CitizenModel;
use App\Models\SuperheroModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    function loginAction($request)
    {
        $us = new UserModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/user/login.php');
        } else {
            if ($_POST['submit'] == 'login') {
                $name = $_POST['user'];
                if ($us->login($name, $_POST['psw'])) {
                    $userType = "guest";
                    $shm = new SuperheroModel();
                    $superhero = $shm->readByName($name)[0];
                    if ($superhero != null) {
                        $userType = $superhero['evolution'];
                        $_SESSION['superhero']['id'] = $superhero['id'];
                    } else {
                        $cm = new CitizenModel();
                        $citizen = $cm->readByName($name)[0];
                        if ($citizen != null) {
                            $userType = 'citizen';
                            $_SESSION['citizen']['id'] = $citizen['id'];
                        }
                    }
                    $_SESSION['user']['profile'] = $userType;
                }
            }
            header('location: /');
        }
    }

    function logoutAction()
    {
        session_destroy();
        header('location: /');
    }
}
