<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Repository\TrickRepository;
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

    /**
     * @Route("/tricks/delete/{slug}", name="trick_delete")
     */
    public function deleteTrick(Trick $trick): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $entityManager = $this->getDoctrine()->getManager();

        if (!empty($trick->getMediaPictures())) {
            foreach ($trick->getMediaPictures() as $mediaPicture)
            $entityManager->remove($mediaPicture);

            unlink($this->getParameter('app.trick_picture_directory').$mediaPicture->getName());
        }

        if (!empty($trick->getMediaVideos())) {
            foreach ($trick->getMediaVideos() as $mediaVideo)
                $entityManager->remove($mediaVideo);
        }

        $entityManager->remove($trick);
        $entityManager->flush();

        $this->addFlash('success', 'Trick successfuly deleted.');

        return $this->redirectToRoute("home");
    }
}
