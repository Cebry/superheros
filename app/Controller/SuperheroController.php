<?php

namespace App\Controller;

use App\Models\SuperheroModel;
use App\Models\UserModel;
use App\Models\EvolutionModel;

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
            $data = array();
            // data[0] es el superheroe
            array_push($data, $sh->read($id)[0]);
            // $data[1] es el array de ids de usuarios
            $um = new UserModel();
            array_push($data, $um->readAll());
            // $data[2] será el array de evoluciones
            $em = new EvolutionModel();
            array_push($data, $em->readAll());
            $this->renderHTML('../views/superhero/edit.php', $data);
        } else {
            if ($_POST['submit'] == 'update') {
                $sh->setId($_POST['id']);
                $sh->setName($_POST['name']);
                $sh->setImage($_POST['image']);
                $sh->setEvolution($_POST['evolution']);
                $sh->setIdUser($_POST['id_user']);
                $sh->update();
            }
            header('location: /sh/list');
        }
    }

    function insertAction()
    {
        $sh = new SuperheroModel();

        if (!isset($_POST['submit'])) {
            $um = new UserModel();
            $data = array();
            // $data[0] es el array de ids de usuarios
            $um = new UserModel();
            array_push($data, $um->readAll());
            // $data[1] será el array de evoluciones
            $em = new EvolutionModel();
            array_push($data, $em->readAll());
            $this->renderHTML('../views/superhero/insert.php', $data);
        } else {
            if ($_POST['submit'] == 'insert') {
                $sh->setName($_POST['name']);
                $sh->setImage($_POST['image']);
                $sh->setEvolution($_POST['evolution']);
                $sh->setIdUser($_POST['id_user']);
                $sh->insert();
            }
            // header('location: /sh/list');
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
            header('location: /sh/list');
        }
    }
}
