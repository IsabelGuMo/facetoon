<?php

namespace App\Controller;


use App\Security\Authenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    private Authenticator $authenticator;

    public function __construct(Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    public function authenticate(Request $request): Response
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $member = $this->authenticator->authenticate($email, $password);

        if (is_null($member)) {
            // Mensaje de error al usuario
            $this->addFlash('error', 'Cagada');
            return new Response('Las cagao');
        }

        // crear sesión usuario y redirigir con id de miembro
        $session->set('memberId', $member->getId());

        return $this->redirectToRoute('posts');
    }
}