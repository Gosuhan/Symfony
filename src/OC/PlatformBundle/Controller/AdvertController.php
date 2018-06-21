<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
        $url = $this->get('router')->generate(
            'oc_platform_view',
            array('id' => 5)
        );

        return new Response("L'URL de l'annonce d'id 5 est : ".$url);
    }

    // public function viewAction($id, Request $request)
    // {
    //     $tag = $request->query->get('tag');

    //     return new Response(
    //         "Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag
    //     );
    // }

    // public function viewAction($id)
    // {
    //     $response = new Response();

    //     $response->setContent("Ceci est une page d'erreur 404");

    //     $response->setStatusCode(Response::HTTP_NOT_FOUND);

    //     return $response;
    // }

    public function viewAction($id)
    {
        $url = $this->get('router')->generate('oc_platform_home');

        return new RedirectResponse($url); // OU return $this->redirect($url) // OU ENCORE PLUS COURT (SS LIGNE DU DESSUS) return $this->redirectToRoute('oc_platform_home');
    }

    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
}

#    Créaion d'un lien dans une vue Twig, en considérant bien sûr
#    que la variable advert_id est disponible

# <a href="{{ path('oc_platform_view', { 'id': advert_id }) }}">
#     Lien vers l'annonce d'id {{ advert_id }}
# </a>