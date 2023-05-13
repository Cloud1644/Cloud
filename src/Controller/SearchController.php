<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("search")
 */

class SearchController extends AbstractController
{
    /**
     * @Route("/", name="searchByName")
     */
    public function searchByNameAction(ProductRepository $repo, Request $req): Response
    {
        $name = $req->query->get('name');
        $prods = $repo->searchByName($name);
        return $this->render('home.html.twig', [
            'products'=>$prods
        ]);
    }
    // /**
    //  * @Route("/product", name="searchByNamePro")
    //  */
    // public function searchProductAction(ProductRepository $repo, Request $req): Response
    // {
    //     $name = $req->query->get('name');
    //     $prods = $repo->searchByName($name);
    //     return $this->render('home.html.twig', [
    //         'products'=>$prods
    //     ]);
    // }
}
