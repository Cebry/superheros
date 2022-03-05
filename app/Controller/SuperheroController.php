<?php

namespace App\Controller;

use App\Models\SuperheroModel;
use App\Models\UserModel;
use App\Models\EvolutionModel;
use App\Controller\ErrorController;
use App\Models\AbilityModel;
use App\Models\SuperheroAbilityModel;

use Exception;

define('MAX_FILE_SIZE', 500000);
define('IMG_DIR_PATH', 'img');
class SuperheroController extends BaseController
{
    function listAction()
    {
        $sh = new SuperheroModel();
        $superheroes = $sh->readLastPage();
        $sam = new SuperheroAbilityModel();
        $am = new AbilityModel();
        $data = array();
        foreach ($superheroes as $sh) {
            $shAbs = $sam->readBySuperheroId($sh['id']);
            $abilities = array();
            foreach ($shAbs as $shAb) {
                $ability = $am->read($shAb['id_ability']);
                array_push($abilities, array($ability['name'], $shAb['value']));
            }

            $sh['abilities'] = $abilities;
            array_push($data, $sh);
        }
        if ($_SESSION['user']['profile'] == 'expert') {
            $this->renderHTML('../views/superhero/crud.php', $data);
        } else {
            $this->renderHTML('../views/superhero/list.php', $data);
        }
    }

    function searchAction()
    {
        $sm = new SuperheroModel();
        $superheroes = $sm->readByName($_GET['name']);
        if ($superheroes != null) {
            $sam = new SuperheroAbilityModel();
            $am = new AbilityModel();
            $data = array();
            foreach ($superheroes as $sh) {
                $shAbs = $sam->readBySuperheroId($sh['id']);
                $abilities = array();
                foreach ($shAbs as $shAb) {
                    $ability = $am->read($shAb['id_ability']);
                    array_push($abilities, array($ability['name'], $shAb['value']));
                }

                $sh['abilities'] = $abilities;
                array_push($data, $sh);
            }
            $this->renderHTML('../views/superhero/list.php', $data);
        } else (new ErrorController)->Error404SuperheroAction();
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
            header('location: /');
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
            header('location: /');
        }
    }

    function registerAction()
    {
        $sh = new SuperheroModel();
        $am = new AbilityModel();
        $data = $am->readAll();

        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/superhero/register.php', $data);
        } else {
            if ($_POST['submit'] == 'register') {

                $file = $_FILES['img'];
                $file['name'] = ($_POST['name'] . '.png');

                try {
                    subirImagen($file);
                    $um = new UserModel();
                    $um->setUser($_POST['user']);
                    $um->setPsw($_POST['psw']);
                    $um->insert();
                    $sh->setName($_POST['name']);
                    $sh->setImage($file['name']);
                    $sh->setEvolution('beginner');
                    $sh->setIdUser($um->lastInsert());
                    $sh->insert();
                    $sam = new SuperheroAbilityModel();
                    $sam->setIdSuperhero($sh->lastInsert());
                    foreach ($data as $ability) {
                        if (isset($_POST[$ability['name']])) {
                            $sam->setIdAbility($ability['id']);
                            $sam->setValue($_POST[$ability['name']]);
                            $sam->insert();
                        }
                    }
                } catch (Exception $e) {
                    echo '<p>ERROR ' . $e->getMessage() . '</p>';
                }
            }
            header('location: /');
        }
    }

    function editAbilitiesAction()
    {
        $am = new AbilityModel();
        $data = $am->readAll();
        if (!isset($_POST['submit'])) {
            $this->renderHTML('../views/superhero/edit.php', $data);
        } else {
            if ($_POST['submit'] == 'edit') {
                $sam = new SuperheroAbilityModel();
                $sam->setIdSuperhero($_POST['superhero_id']);
                foreach ($data as $ability) {
                    if (isset($_POST[$ability['name']])) {
                        $sam->setIdAbility($ability['id']);
                        $sam->setValue($_POST[$ability['name']]);
                        $sam->insert();
                    }
                }
            }
            header('location: /');
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
            header('location: /');
        }
    }
}

// sudo chown www-data DIR/public/img
function subirImagen($file)
{
    $file_path = IMG_DIR_PATH . '/' . basename($file['name']);

    $imageFileType = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

    if (getimagesize($file) != false) {
        throw new Exception('El fichero no es una imagen.');
    }

    if (file_exists($file_path)) {
        throw new Exception('Ya existe un fichero con ese nombre.');
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        throw new Exception('El archivo es demasiado grande.');
    }

    if (
        !($imageFileType == 'jpg'
            || $imageFileType == 'png'
            || $imageFileType == 'jpeg'
            || $imageFileType == 'gif')
    ) {
        throw new Exception('Solo están permitidos JPG, JPEG, PNG y GIF.');
    }
    if (!move_uploaded_file($file['tmp_name'], $file_path)) {
        throw new Exception('Ha ocurrido un error.');
    }
}
