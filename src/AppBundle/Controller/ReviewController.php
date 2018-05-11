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
     * @Route ("/review/{review_id}/user/{user_id}", name="listing_review", requirements={"review_id": "\d+"})
     * @Method("GET")
     * @ParamConverter("review", options={"mapping": {"review_id": "id"}})
     * @ParamConverter("user", options={"mapping": {"user_id": "id"}})
     */
    public function indexAction(Review $review, User $user)
    {
        return $this->render('review/index.html.twig', array(
            'review' => $review,
            'user' => $user
        ));
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
