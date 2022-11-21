<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     */
    public function number(Request $request, SessionInterface $session): Response
    {
        //dump($request);
        $min = $request->query->get("min");
        $max =  $request->query->get("max");
        $favorite = $session->get("favorite");

        if (!$min || !$max) {
            throw $this->createNotFoundException("La valeur minimale ou maximale n'est pas définie dans l’URL");
        }

        return $this->render("lucky/number.html.twig", [
            "number" => random_int($min, $max),
            "min" => $min,
            "max" => $max,
            "favorite" => $favorite,
        ]);
    }
}