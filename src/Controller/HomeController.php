<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(TrickRepository $trickRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $offset = $request->query->get('offset');
            $tricks = $trickRepository->findBy([], ['createdDate' => 'DESC'], 8, $offset);

            $tricksData = [];
            foreach ($tricks as $trick) {
                $mediaPictures = $trick->getMediaPictures();
                if (isset($mediaPictures[0])) {
                    $picture = $mediaPictures[0]->getName();
                }

                $tricksData[] = [
                    'id' => $trick->getId(),
                    'title' => $trick->getTitle(),
                    'slug' => $trick->getSlug(),
                    'picture' => $picture
                ];
            }

            $connected = false;
            if ($this->getUser()) {
                $connected = true;
            }

            return $this->json(['tricks' => $tricksData, 'connected' => $connected]);

        }

        $tricks = $trickRepository->findBy([], ['createdDate' => 'DESC'], 12, 0);

        return $this->render('home/home.html.twig', [
            'tricks' => $tricks
        ]);
    }
}
