<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use AppBundle\Form\ReviewType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends AbstractController
{
    /**
     * List one review with one user
     *
     * @Route ("/review/", name="review_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('AppBundle:Review')->findAll();

        return $this->render('review/index.html.twig', array(
            'reviews' => $reviews,
        ));
    }


    /**
     * List one review with one user
     *
     * @Route ("/review/show/{id}", name="review_show")
     * @Method("GET")
     */
    public function showAction(Review $review)
    {
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('AppBundle:Review')->findOneById($review->getId());

        return $this->render('review/show.html.twig', array(
            'review' => $review
        ));
    }

    /**
     * List one review with one user
     *
     * @Route ("/review/edit/{id}", name="review_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Review $review, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $review = $em->getRepository('AppBundle:Review')->findOneById($review->getId());
        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            // You can use too :
            // return $this->redirect($this->generateUrl('review_show', array('id' => $review->getId())))

            return $this->redirectToRoute('review_show', array('id' => $review->getId()));
        }
        return $this->render('review/edit.html.twig', array(
            'review' => $review,
            'form' => $form->createView(),
        ));
    }

    /**
     * List one review with one user
     *
     * @Route ("/review/delete/{id}", name="review_delete")
     * @Method("GET")
     */
    public function deleteAction(Review $review)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($review);
        $em->flush();
        return $this->redirectToRoute('review_index');
    }

    /**
     * new review
     *
     * @Route ("/review/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $review = new Review();
        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            // You can use too :
            // return $this->redirect($this->generateUrl('review_show', array('id' => $review->getId())))

            return $this->redirectToRoute('review_show', array('id' => $review->getId()));
        }

        return $this->render('review/new.html.twig', array(
            'review' => $review,
            'form' => $form->createView(),
        ));

    }
}
