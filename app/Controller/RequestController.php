<?php

namespace App\Controller;

use App\Models\RequestModel;
use App\Models\SuperheroModel;

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

                $rm = new RequestModel();
                $rm->setIdSuperhero($_SESSION['superhero']['id']);
                var_dump($rm->countCheckedFromSuperheroId());
                if ($rm->countCheckedFromSuperheroId() == 3) {
                    $sh = new SuperheroModel();
                    $sh->setId($_SESSION['superhero']['id']);
                    $sh->setExpert();
                }
            }
            header('location: /request/list');
        }
    }
}
