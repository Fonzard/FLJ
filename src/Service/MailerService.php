<?php
namespace App\Service;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
/**
 * Mail service, qui permet de générer un mail
 */
class MailerService {
    public function __construct(private readonly MailerInterface $mailer){}

    /**
     * @throw TransportExceptionInterface
     */
    public function send (
        string $to, 
        string $subject,
        string $templateTwig,
        array $context): void
    {
        $email = (new TemplatedEmail())
            ->from(new Address('noreply@monsitededev.fr', 'FLJ'))
            ->to($to)
            ->subject($subject)
            ->htmlTemplate("mails/$templateTwig")
            ->context($context);
        try {
            $this->mailer->send($email);
        } catch(TransportExceptionInterface $transportException) {
            /** @var TransportExceptionInterface  $transportException  */
            throw $transportException;
        }
    }
}
