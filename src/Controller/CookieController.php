<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CookieController extends AbstractController
{
    #Reponse type redirection
    #[Route('/cookie/get', name: 'cookie-get')]
    public function page(Request $request): Response
    {
        dump($request->cookies->get("theme"));
        return $this->render('cookie/index.html.twig');
    }

    #[Route('/definir/cookie/{theme}')]
    public function defineCookie($theme) : Response
    {
        $response = $this->redirectToRoute('cookie-get');

        $cookie = Cookie::create('theme', $theme);

        $response->headers->setCookie($cookie);

        return $response;

    }




}
