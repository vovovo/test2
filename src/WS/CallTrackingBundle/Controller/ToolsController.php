<?php

namespace WS\CallTrackingBundle\Controller;
use Nelmio\ApiDocBundle\Tests\Fixtures\Form\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WS\CallTrackingBundle\Entity\Phones;
use WS\CallTrackingBundle\Entity\PhoneToUtmToUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use WS\CallTrackingBundle\Service;

use Doctrine_core;

class ToolsController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('WSCallTrackingBundle:Personal:index.html.twig');
    }

    /**
     * @Route("/parse_numbers")
     */
    public function parseNumbersAction()
    {
        $retArr = [];
        /*$wapi = $this->get('ws_api_phone_interface');
        $wapi->parsePhones();*/
        $response = new Response();
        $response->setContent(json_encode($retArr));

        return $response;
    }

}