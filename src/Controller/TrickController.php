<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/tricks/details/{slug}", name="trick_detail")
     */
    public function detailTrick(Trick $trick): Response
    {
        return $this->render('trick/trick.html.twig', [
            'trick' => $trick
        ]);
    }
}
