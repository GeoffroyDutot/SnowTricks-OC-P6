<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/tricks/details/{slug}", name="trick_detail")
     */
    public function detailTrick(Trick $trick, Request $request): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

            $comment->setTrick($trick);
            $comment->setCreatedDate(new \DateTime('now'));
            $comment->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Comment created.');
            return $this->redirectToRoute($request->attributes->get('_route'), ['slug' => $trick->getSlug()]);
        }

        return $this->render('trick/trick.html.twig', [
            'trick' => $trick,
            'commentForm' => $form->createView(),
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
