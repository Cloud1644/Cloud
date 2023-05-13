<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    private CategoryRepository $repo;
    public function __construct(CategoryRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="category_show")
     */
    public function readAllCatAction(): Response
    {
        $categories = $this->repo->findAll();
        return $this->render('category/index.html.twig', [
            'categories'=>$categories
        ]);
    }

    /**
     * @Route("/add", name="category_create")
     */
    public function createAction(Request $req): Response
    {
        
        $c = new Category();
        $form = $this->createForm(CategoryType::class, $c);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->add($c,true);
            return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("category/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="category_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Category $c): Response
    {
        
        $form = $this->createForm(CategoryType::class, $c);   

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            $this->repo->add($c,true);
            return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("category/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}",name="category_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Category $c): Response
     {
         $this->repo->remove($c,true);
         return $this->redirectToRoute('category_show', [], Response::HTTP_SEE_OTHER);
     }
}
