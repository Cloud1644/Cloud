<?php

namespace App\Controller;

use App\Entity\ExportOrder;
use App\Form\ExportDetailType;
use App\Entity\ExportOrderDetail;
use App\Form\ExportOrderType;
use App\Repository\ExportOrderDetailRepository;
use App\Repository\ExportOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExportOrderController extends AbstractController
{
        private ExportOrderRepository $repo;
    public function __construct(ExportOrderRepository $repo)
   {
      $this->repo = $repo;
   }

   /**
     * @Route("/export", name="export_show")
     */
    public function readAllCatAction(): Response
    {
        $exs = $this->repo->findAll();
        return $this->render('export_order/index.html.twig', [
            'exports'=>$exs
        ]);
    }
   
     /**
     * @Route("/export/add", name="export_create")
     */
    public function createEx(Request $req): Response
    {
        $e = new ExportOrder();
        $form = $this->createForm(ExportOrderType::class, $e);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $this->repo->add($e,true);

            
            return $this->redirectToRoute('export_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("export_order/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/exportdetail/add/{id}", name="exportdetail_add")
     */
    public function createExDetail(Request $req, 
    ExportOrder $eo,ExportOrderDetailRepository $eoRepo): Response
    {
        $e = new ExportOrderDetail();
        $form = $this->createForm(ExportDetailType::class, $e);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $e->setExorder($eo);
            $eoRepo->add($e,true);

            // return new JsonResponse("ok");
            return $this->redirectToRoute('export_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("export_detail/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/export/edit/{id}", name="export_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, ExportOrder $e): Response
    {
        
        $form = $this->createForm(ExportOrderType::class, $e);   

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            $this->repo->add($e,true);
            return $this->redirectToRoute('export_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("export_order/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/export/delete/{id}",name="export_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, ExportOrder $p): Response
     {
         $this->repo->remove($p,true);
         return $this->redirectToRoute('export_show', [], Response::HTTP_SEE_OTHER);
     }
}
