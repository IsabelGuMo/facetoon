<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        if (is_null($session->get('memberId'))) {
            $this->redirect('authenticate');
        }

        $this->redirect('posts'); // con id de miembro como parámetro
    }
}