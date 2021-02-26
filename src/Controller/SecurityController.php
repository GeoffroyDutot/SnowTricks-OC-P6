<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ForgotPasswordFormType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('home');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/logout_message", name="logout_message")
     */
    public function logoutMessage()
    {
        $this->addFlash('success', "You've been disconnected. Bye bye !");
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/forgot-password", name="forgot_password")
     */
    public function forgotPassword(Request $request, UserRepository $userRepository, TokenGeneratorInterface $tokenGenerator, MailerInterface $mailer)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createForm(ForgotPasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userEmail = $form->get('email')->getData();
            $user = $userRepository->findOneBy(['email' => $userEmail]);
            if (empty($user)) {
                $this->addFlash('error', 'User not found.');
                return $this->redirectToRoute('forgot_password');
            }

            $token = $tokenGenerator->generateToken();

            try {
                $user->setResetToken($token);
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());
                return $this->redirectToRoute('home');
            }

            $url = $this->generateUrl('reset_password', ['resetToken' => $user->getResetToken()], UrlGeneratorInterface::ABSOLUTE_URL);

            $email = (new TemplatedEmail())
                ->from(new Address('contact@snowtricks.fr', 'Snowtricks'))
                ->to($user->getEmail())
                ->subject('Reset you password')
                ->htmlTemplate('email/reset_password.html.twig')
                ->context([
                    'user' => $user,
                    'url' => $url,
                    'emailContact' => 'contact@snowtricks.fr'
                ]);

            $mailer->send($email);

            $this->addFlash('success', 'Email sent !');

            return $this->redirectToRoute('home');
        }

        return $this->render('security/forgot_password.html.twig', [
            'forgotPasswordForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/reset-password/{resetToken}", name="reset_password")
     */
    public function resetPassword(User $user)
    {

    }
}
