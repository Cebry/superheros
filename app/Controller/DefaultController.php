<?php

namespace App\Controller;

//Use clases que utilizo

class DefaultController extends BaseController
{

    function saludaAction()
    {
        $this->renderHTML('../views/holamundo_view.html');
    }

    private function diezPrimerosPares()
    {
        $array = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($array, $i * 2);
        }
        return $array;
    }
    function numerosAction()
    {
        $data = $this->diezPrimerosPares();
        $this->renderHTML('../views/numeros_view.php', $data);
    }
}
