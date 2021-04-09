<?php


namespace App\Security;

use App\Entity\User as User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    private $mailer;

    private $urlGenerator;

    public function __construct(MailerInterface $mailer, UrlGeneratorInterface $urlGenerator) {
        $this->mailer = $mailer;
        $this->urlGenerator = $urlGenerator;
    }

    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof User) {
            return;
        }
    }

    public function checkPostAuth(UserInterface $user)
    {
        if (!$user instanceof User) {
            return;
        }

        // If user doesn't validate his account - Notify error and resend email validation
        if (!$user->getValidated() && $user->getValidationToken()) {
            $url = $this->urlGenerator->generate('validate_user', ['validationToken' => $user->getValidationToken()], UrlGeneratorInterface::ABSOLUTE_URL);

            $email = (new TemplatedEmail())
                ->from(new Address('contact@snowtricks.fr', 'Snowtricks'))
                ->to($user->getEmail())
                ->subject('Validate you registration')
                ->htmlTemplate('email/validate_registration.html.twig')
                ->context([
                    'user' => $user,
                    'url' => $url,
                    'emailContact' => 'contact@snowtricks.fr'
                ]);

            $this->mailer->send($email);

            throw new CustomUserMessageAccountStatusException('Your user account is not active. Please check your emails to validate it.');
        }

        // If user is not activated and has no validationToken - Notify error
        if (!$user->getValidated() && !$user->getValidationToken()) {
            throw new CustomUserMessageAccountStatusException('Your user account has been deactivated.');
        }
    }
}
