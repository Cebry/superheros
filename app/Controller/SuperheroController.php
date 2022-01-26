<?php

namespace App\Controller;

//Use clases que utilizo
use App\Models\Superhero;


class SuperheroController extends BaseController
{
    function homeAction()
    {
        $sh = new Superhero();
        $data = $sh->readLastPage();
        $this->renderHTML('../views/listSuperheroes.php', $data);
    }

    function editSuperheroAction()
    {
        $sh = new Superhero();
        if (!isset($_POST['submit'])) {
            $id =  basename($_SERVER['PATH_INFO'], "/sh/edit/");
            $data = $sh->read($id);
            $this->renderHTML('../views/editSuperhero.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'update') {
                $sh->setId($_POST['id']);
                $sh->setName($_POST['name']);
                $sh->setSpeed($_POST['speed']);
                $sh->update();
            }
            header('location: /' . DIRBASEURL);
        }
    }

    function insertSuperheroAction()
    {
        $sh = new Superhero();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/insertSuperhero.php');
        } else {
            if ($_POST['submit'] == 'insert') {
                $sh->setName($_POST['name']);
                $sh->setSpeed($_POST['speed']);
                $sh->insert();
            }
            header('location: /' . DIRBASEURL);
        }
    }

    function deleteSuperheroAction()
    {
        $sh = new Superhero();
        if (!isset($_POST['submit'])) {
            $id =  basename($_SERVER['PATH_INFO'], "/sh/del/");
            $data = $sh->read($id);
            $this->renderHTML('../views/deleteSuperhero.php', $data[0]);
        } else {
            if ($_POST['submit'] == 'delete') {
                $sh->setId($_POST['id']);
                $sh->delete();
            }
            header('location: /' . DIRBASEURL);
        }
    }
}
