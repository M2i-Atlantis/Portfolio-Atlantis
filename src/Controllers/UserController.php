<?php

namespace App\Controllers;

class UserController
{
    public function login()
    {
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }
}