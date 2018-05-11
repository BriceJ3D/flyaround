<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReviewController extends Controller
{
    /**
     * List one review with one user
     *
     * @Route ("/review/", name="listing_review")
     * @Method("GET")
    */
    public function indexAction()
    {
        return $this->render('review/index.html.twig', array());
    }

    /**
     * new review
     *
     * @Route ("/review/new", name="new_review")
     * @Method("POST")
     */
    public function newAction()
    {
        return $this->render('review/new.html.twig', array());
    }
}
