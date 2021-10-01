<?php

namespace App\controllers;

use core\Renderer;

abstract class AbstractController extends ErrorController
{
    public function __construct(
        protected Renderer $renderer
    )
    {
    }
}