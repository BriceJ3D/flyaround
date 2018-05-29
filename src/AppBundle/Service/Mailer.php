<?php
/**
 * Created by PhpStorm.
 * User: wilder13
 * Date: 29/05/18
 * Time: 15:05
 */

namespace AppBundle\Service;


class Mailer
{
    /**
     * @var
     */
    private $mailer;

    /**
     * @var
     */
    private $templating;

    /**
     * Constructor
     *
     * @param string $unit Defined in config.yml
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendMail($to, $from, $typeMessage)
    {
        $message = (new \Swift_Message('Réservation Flyaround'))
            ->setFrom($from)
            ->setTo($to);
        if ($typeMessage === 'confirmation') {
            $message->setBody($this->templating->render('mail/notification.html.twig'), 'text/html');
        } else {
            $message->setBody($this->templating->render('mail/confirmation.html.twig'), 'text/html');
        }
        $this->mailer->send($message);

    }
}