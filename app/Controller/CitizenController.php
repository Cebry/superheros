<?php

namespace App\Controller;

use App\Models\CitizenModel;

class CitizenController extends BaseController
{
    function listAction()
    {
        $us = new CitizenModel();
        $data = $us->readLastPage();
        $this->renderHTML('../views/citizen/list.php', $data);
    }

    function editAction($request)
    {
        $us = new CitizenModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/citizen/edit/");
            $data = $us->read($id);
            $this->renderHTML('../views/citizen/edit.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'update') {
                $us->setId($_POST['id']);
                $us->setName($_POST['name']);
                $us->setEmail($_POST['email']);
                $us->setIdUser($_POST['idUser']);
                $us->update();
            }
            header('location: /citizen/list');
        }
    }

    function insertAction()
    {
        $us = new CitizenModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/citizen/insert.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $us->setName($_POST['name']);
                $us->setEmail($_POST['email']);
                $us->setIdUser($_POST['idUser']);
                $us->insert();
            }
            header('location: /citizen/list');
        }
    }

    function deleteAction($request)
    {
        $us = new CitizenModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/citizen/del/");
            $data = $us->read($id);
            $this->renderHTML('../views/citizen/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $us->setId($_POST['id']);
                $us->delete();
            }
            header('location: /citizen/list');
        }
    }
}
