<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
    /**
     * @Route("redirect")
     */
    public function redirection(SessionInterface $session): Response
    {
        $session->set("favorite", 30);
        return $this->redirectToRoute("app_lucky_number", [
            "min" => 29,
            "max" => 32
        ]);
    }
}