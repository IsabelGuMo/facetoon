<?php

namespace App\Controller;

use App\Services\Publisher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PostsController extends AbstractController
{
    private Publisher $publisher;

    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    public function userPosts(Request $request)
    {
        $memberId = $request->query->get('memberId');

        if ($memberId !== $session->get('memberId')) {
            $this->redirect('authenticate');
        }
        // Listado de todos los posts del usuario + formulario crear nuevo
    }

    public function publish(Request $request)
    {
        $memberId = $session->get('memberId');

        // check existe sesión
        $text = $request->get('text');
        $title = $request->get('title');
        // validar texto no vacío

        try {
            $this->publisher->publish($memberId, $title, $text);
            $this->redirect('posts');
        } catch (\Exception $e) {
            $this->addFlash('Mensaje error');
        }
    }
}