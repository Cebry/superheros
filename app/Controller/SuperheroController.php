<?php

namespace App\Controller;

use App\Models\SuperheroModel;

class SuperheroController extends BaseController
{
    function listAction()
    {
        $sh = new SuperheroModel();
        $data = $sh->readLastPage();
        $this->renderHTML('../views/superhero/list.php', $data);
    }

    function editAction($request)
    {
        $sh = new SuperheroModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/sh/edit/");
            $data = $sh->read($id);
            $this->renderHTML('../views/superhero/edit.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'update') {
                $sh->setId($_POST['id']);
                $sh->setName($_POST['name']);
                $sh->update();
            }
            header('location: /' . DIRBASEURL);
        }
    }

    function insertAction()
    {
        $sh = new SuperheroModel();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/superhero/insert.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $sh->setName($_POST['name']);
                $sh->insert();
            }
            header('location: /' . DIRBASEURL);
        }
    }

    function deleteAction($request)
    {
        $sh = new SuperheroModel();
        if (!isset($_POST['submit'])) {
            $id =  basename($request, "/sh/del/");
            $data = $sh->read($id);
            $this->renderHTML('../views/superhero/delete.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $sh->setId($_POST['id']);
                $sh->delete();
            }
            header('location: /' . DIRBASEURL);
        }
    }
}
