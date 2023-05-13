<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
     * @Route("/brand")
     */
class BrandController extends AbstractController
{
    
    private BrandRepository $repo;
    public function __construct(BrandRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="brand_show")
     */
    public function readAllCatAction(): Response
    {
        $brand = $this->repo->findAll();
        return $this->render('brand/index.html.twig', [
            'brands'=>$brand
        ]);
    }

    /**
     * @Route("/add", name="brand_create")
     */
    public function createAction(Request $req): Response
    {
        
        $b = new Brand();
        $form = $this->createForm(BrandType::class, $b);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->add($b,true);
            return $this->redirectToRoute('brand_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("brand/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="brand_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Brand $b): Response
    {
        
        $form = $this->createForm(BrandType::class, $b);   

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            $this->repo->add($b,true);
            return $this->redirectToRoute('brand_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("brand/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}",name="brand_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Brand $b): Response
     {
         $this->repo->remove($b,true);
         return $this->redirectToRoute('brand_show', [], Response::HTTP_SEE_OTHER);
     }
}
