<?php

namespace App\Controller;

use App\Models\RequestModel;

class RequestController extends BaseController
{
    function listAction()
    {
        $us = new RequestModel();
        $data = $us->readLastPage();
        $this->renderHTML('../views/request/list.php', $data);
    }

    function editAction($request)
    {
        $us = new RequestModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/request/edit/");
            $data = $us->read($id);
            $this->renderHTML('../views/request/edit.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'update') {
                $us->setId($_POST['id']);
                $us->setTitle($_POST['title']);
                $us->setDescription($_POST['description']);
                $us->setDone($_POST['done']);
                $us->setIdSuperhero($_POST['idSuperhero']);
                $us->setIdCitizen($_POST['idCitizen']);
                $us->update();
            }
            header('location: /' . DIRBASEURL . '/request/list');
        }
    }

    function insertAction()
    {
        $us = new RequestModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/request/insert.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $us->setTitle($_POST['title']);
                $us->setDescription($_POST['description']);
                $us->setDone($_POST['done']);
                $us->setIdSuperhero($_POST['idSuperhero']);
                $us->setIdCitizen($_POST['idCitizen']);
                $us->insert();
            }
            header('location: /' . DIRBASEURL . '/request/list');
        }
    }

    function deleteAction($request)
    {
        $us = new RequestModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/request/del/");
            $data = $us->read($id);
            $this->renderHTML('../views/request/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $us->setId($_POST['id']);
                $us->delete();
            }
            header('location: /' . DIRBASEURL . '/request/list');
        }
    }
}
