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
}
