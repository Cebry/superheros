<?php

namespace App\Controller;

use App\Models\RequestModel;
use App\Models\SuperheroModel;
use App\Models\CitizenModel;

class RequestController extends BaseController
{
    function listFromSuperheroIdAction()
    {
        $rm = new RequestModel();
        $rm->setIdSuperhero($_SESSION['superhero']['id']);
        $data = $rm->readFromSuperheroId();
        $this->renderHTML('../views/request/list.php', $data);
    }

    function insertAction()
    {
        $rm = new RequestModel();
        if (!isset($_POST['submit'])) {
            $data = array();
            $shm = new SuperheroModel();
            $data = $shm->readAll();
            $this->renderHTML('../views/request/insert.php', $data);
        } else {
            if ($_POST['submit'] == 'insert') {
                $rm->setTitle($_POST['title']);
                $rm->setDescription($_POST['description']);
                $rm->setDone($_POST['done']);
                $rm->setIdSuperhero($_POST['superhero_id']);
                $rm->setIdCitizen($_POST['citizen_id']);
                $rm->insert();
            }
            header('location: /');
        }
    }
    function checkDoneAction()
    {
        $rm = new RequestModel();
        $id = $_POST['id'];
        if (!isset($_POST['submit'])) {
        } else {
            if ($_POST['submit'] == 'checkDone') {
                $rm->setId($id);
                $rm->checkDone();
            }
            header('location: /request/list');
        }
    }
}
