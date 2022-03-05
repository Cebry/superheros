<?php

namespace App\Controller;

use App\Models\CitizenModel;
use App\Models\UserModel;

class CitizenController extends BaseController
{
    function registerAction()
    {
        $cm = new CitizenModel();
        if (!isset($_POST['submit'])) {

            $this->renderHTML('../views/citizen/register.php');
        } else {
            if ($_POST['submit'] == 'register') {
                $um = new UserModel();
                $um->setUser($_POST['user']);
                $um->setPsw($_POST['psw']);
                $um->insert();

                $cm->setName($_POST['name']);
                $cm->setEmail($_POST['email']);
                $cm->setIdUser($um->lastInsert());
                $cm->insert();
            }
            header('location: /');
        }
    }
}
