<?php

namespace App\Controller;

//Use clases que utilizo

class DefaultController extends BaseController
{

    function saludaAction()
    {
        $this->renderHTML('../views/holamundo_view.html');
    }
}
