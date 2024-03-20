<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RequestController extends AbstractController
{
    #[Route('/request', name: 'app_request')]
    public function index(Request $request): Response
    {
       # dump($request->cookies->get('Couleur'));      #valeur d'un cookie
       # dump($request->get('cle'));                   #Parametre d'url(http://localhost:8000?cle=abs&cle2=xyz -> abc)
       # dump($request->getQueryString());                  # /Url relative -> /request
        dump($request->getClientIp());                     # IP navigateur
        dump($request->getHost());                         # IP du serveur -> 127.0.0.1
        dump($request->getHttpHost());                     # IP et port du serveur -> 127.0.0.1:8000
    }
}
