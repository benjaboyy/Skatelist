<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class DefaultController extends Controller
{
    /**
    * @Route("/", name="skatelist")
    */
   public function indexAction(Request $request)
   {
        $em = $this->getDoctrine()->getManager();
        $skateparks = [];
       
        $form = $this->createFormBuilder()
            ->add('zoek', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm();
       
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $zoek = strtolower($form->getData()['zoek']);
           $query = $this->getDoctrine()->getRepository('AppBundle:Skatepark')->createQueryBuilder('p');
           $skateparks = $query->where('LOWER(p.name) LIKE :zoek OR LOWER(p.location) LIKE :zoek')->setParameter(':zoek', '%'.$zoek.'%')->getQuery()->getResult();
       }
       
        return $this->render('default/parken.html.twig', array(
            'skateparks' => $skateparks,
            'form'=>$form->createView()
        ));
   }
    /**
    * @Route("/riders", name="riders")
    */
   public function showAction()
   {
        $em = $this->getDoctrine()->getManager();
        $skateparks = $em->getRepository('AppBundle:Skatepark')->findAll();
       
        return $this->render('default/riders.html.twig', array(
            'skateparks' => $skateparks,
        ));
   }
}
