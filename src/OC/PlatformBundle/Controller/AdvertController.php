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

    // public function viewAction($id)
    // {
    //     $url = $this->get('router')->generate('oc_platform_home');

    //     return new RedirectResponse($url); // OU return $this->redirect($url) // OU ENCORE PLUS COURT (SS LIGNE DU DESSUS) return $this->redirectToRoute('oc_platform_home');
    // }

    // public function viewAction($id)
    // {
    //     $response = new Response(json_encode(array('id' => $id)));

    //     $response->headers->set('Content-Type', 'application/json');

    //     return $response; // OU EN UNE SEULE LIGNE return new JsonResponse(arry('id' => $id));
    // }

    public function viewAction($id, Request $request)
    {
        $session = $request->getSession();

        $userId = $session->get('user_id');

        $session->set('user_id', 91);

        return new Response("<body>Je suis une page de test, je n'ai rien Ã  dire</body>");
    }

    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
    
    public function addAction(Request $request)
    {
    	$session = $request->getSession();
    	$session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrée !');
    	return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }
    
}

#    CrÃ©aion d'un lien dans une vue Twig, en considÃ©rant bien sÃ»r
#    que la variable advert_id est disponible

# <a href="{{ path('oc_platform_view', { 'id': advert_id }) }}">
#     Lien vers l'annonce d'id {{ advert_id }}
# </a>
