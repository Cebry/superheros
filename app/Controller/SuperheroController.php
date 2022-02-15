<?php

namespace App\Controller;

use App\Models\AbilityModel;
use App\Models\SuperheroAbilityModel;
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
            header('location: /sh/list');
        }
    }

    function insertAction()
    {
        $sh = new SuperheroModel();

        $am = new AbilityModel;
        $allAbilities = $am->readAll();

        if (!isset($_POST['submit'])) {

            $this->renderHTML('../views/superhero/insert.php', $allAbilities);
        } else {
            if ($_POST['submit'] == 'insert') {
                $sh->setName($_POST['name']);
                $sh->insert();
                $sam = new SuperheroAbilityModel();
                foreach ($allAbilities as $ability) {
                    $abilityName = $ability['name'];
                    if ($_POST[$abilityName] != 0) {
                        $sam->setIdAbility($ability['id']);
                        $sam->setIdSuperhero($sh->getId());
                        $sam->setValue($_POST[$abilityName]);
                        $sam->insert();
                    }
                }
            }
            header('location: /sh/list');
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
