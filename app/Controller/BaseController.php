<?php

namespace App\Controller;

class BaseController
{
    public function renderHTML($fileName)
    {
        include($fileName);
    }
}
