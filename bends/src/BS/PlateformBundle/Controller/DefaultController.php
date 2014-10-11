<?php

namespace BS\PlateformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BSPlateformBundle:Default:index.html.twig', array('name' => $name));
    }
}
