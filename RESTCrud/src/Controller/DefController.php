<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefController
 * @package App\Controller
 * @Route("/")
 */
class DefController extends AbstractController
{

    /**
     * @Route("/", name="default_index")
     */
    public function index(){
        return new JsonResponse([
           'action' => 'index',
            'time' => time()
        ]);
    }

}