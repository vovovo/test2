<?php

namespace WS\CallTrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use WS\CallTrackingBundle\Entity\UserActivity;
use FOS\UserBundle\FOSUserBundle;
use WS\CallTrackingBundle\Entity\UserActivityTrack;
use UserBundle\UserBundle;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('WSCallTrackingBundle:Default:index.html.twig');
    }


    /**
     * @Route("/get_tracking_js")
     */
    public function trackingJSAction(Request $request)
    {
        $data_arr = [];
        $user = $this->getDoctrine()
            ->getRepository("UserBundle:User")
            ->findOneBy(['api_key'=>$request->get('apiKey')]);

        $data_arr['phones_list'] = $this->getDoctrine()
            ->getRepository("WSCallTrackingBundle:PhoneToUtmToUser")
            ->findByUser($user->getId());

        return $this->render('WSCallTrackingBundle:Default:callTracking.js.twig',$data_arr);
    }


    /**
     * @Route("/send-data")
     */
    public function sendDataAction(Request $request)
    {
        $data_arr = [];

        if($request->get('user_activity_key')){
            $timestamp = new \DateTime('now');
            $user_activity_key = $request->get('user_activity_key');
            $userAct = new UserActivityTrack();
            $userAct->setUserActivityKey($user_activity_key)
                ->setCreateAt($timestamp)
                ->setUpdatedAt($timestamp)
                ->setCoockieString($request->get('cookies'))
                ->setUrlCurrent($request->get('current_url'))
                ->setUrlReferer($request->get('referer_url'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($userAct);
            $em->flush();

        }else{
            $key =  $request->get('api_key');
            $userObj = $this->getDoctrine()
                ->getRepository("UserBundle:User")
                ->findOneBy(['api_key'=>$key]);
            $user_id = $userObj->getId();
            $user_activity_key = md5(microtime());
            $userAct = new UserActivity();
            $userAct->setCookies($request->get('cookies'))
                ->setRefererUrl($request->get('referer_url'))
                ->setCurrentUrl($request->get('current_url'))
                ->setUserActivityKey($user_activity_key);
            $userAct->setUser($user_id);
            $em = $this->getDoctrine()->getManager();
            $em->persist($userAct);
            $em->flush();

        }

        $data_arr['user_activity_key'] = $user_activity_key;

        return $this->render('WSCallTrackingBundle:Default:cts1.js.twig',$data_arr);
    }



}
