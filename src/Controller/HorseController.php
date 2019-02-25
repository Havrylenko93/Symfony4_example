<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HorseController extends AbstractController
{
    /**
     * @Route("/horse", name="horse")
     */
    public function index()
    {
        return $this->render('horse/index.html.twig', [
            'controller_name' => 'HorseController',
        ]);
    }
}
