<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $AllParcours = $em->getRepository('AppBundle:Parcours')
            ->findAll();
        $AllExperience = $em->getRepository('AppBundle:Experience')
            ->findAll();

        return $this->render('AppBundle:default:index.html.twig',[
            'AllParcours' => $AllParcours,
            'AllExperience' => $AllExperience
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function Blog() {
        $em = $this->getDoctrine()->getManager();
        $AllBlog = $em->getRepository('AppBundle:BlogPost')
            ->findAll();

        return $this->render('AppBundle:default:blog.html.twig',[
            'AllBlog' => $AllBlog
        ]);
    }

    /**
     * @Route("/blog/{id}", name="show_blog")
     */
    public function showBlog($id) {
        $blog = $this->getDoctrine()->getRepository('AppBundle:BlogPost')->find($id);
        return $this->render('AppBundle:default:blog.html.twig', [
            'blog' => $blog
        ]);
    }



}
