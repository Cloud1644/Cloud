<?php

namespace App\Controller;

use App\Entity\ImportOrder;
use App\Entity\ImportOrderDetail;
// use App\Form\ImportDetailType;

use App\Repository\ImportOrderDetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/imdetail")
     */
class ImportDetailController extends AbstractController
{

    private ImportOrderDetailRepository $repo;
    public function __construct(ImportOrderDetailRepository $repo)
   {
      $this->repo = $repo;
   }

   /**
     * @Route("/{id}", name="importdetail_show")
     */
        public function fillOrder(ImportOrder $cateid): Response
      {
        $orderDetails = $this->repo->fillOrderById2($cateid);
        $ims = $this->repo->fillOrderById($cateid);
         return $this->render('import_detail/index.html.twig', [
                'ims'=>$ims,
              'orderDetails'=>$orderDetails]);
        
      }

    

}
