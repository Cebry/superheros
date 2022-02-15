<?php

namespace App\Controller;

use App\Models\UserModel;

class UserController extends BaseController
{
    function listAction()
    {
        $us = new UserModel();
        $data = $us->readLastPage();
        $this->renderHTML('../views/user/list.php', $data);
    }

    function editAction($request)
    {
        $us = new UserModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/user/edit/");
            $data = $us->read($id);
            $this->renderHTML('../views/user/edit.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'update') {
                $us->setId($_POST['id']);
                $us->setUser($_POST['user']);
                $us->setPsw($_POST['psw']);
                $us->update();
            }
            header('location: /user/list');
        }
    }

    function insertAction()
    {
        $us = new UserModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/user/insert.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $us->setUser($_POST['user']);
                $us->setPsw($_POST['psw']);
                $us->insert();
            }
            header('location: /user/list');
        }
    }

    function deleteAction($request)
    {
        $us = new UserModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/user/del/");
            $data = $us->read($id);
            $this->renderHTML('../views/user/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $us->setId($_POST['id']);
                $us->delete();
            }
            header('location: /user/list');
        }
    }
}
