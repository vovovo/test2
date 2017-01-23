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

class PersonalSectionController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('WSCallTrackingBundle:Personal:index.html.twig');
    }

    /**
     * @Route("/phones/")
     */
    public function phoneListAction() {
        $data_arr = [];
        $data_arr['phones_list'] = $this->getDoctrine()
            ->getRepository("WSCallTrackingBundle:PhoneToUtmToUser")
            ->findByUser($this->getUser()->getID());
         return $this->render('WSCallTrackingBundle:Personal:phones.html.twig',$data_arr);
    }
    /**
     * @Route("/phones/edit/{item_id}/")
     */
    public function phoneUtmEditAction($item_id, Request $request){

        $currentObj = $this->getDoctrine()
            ->getRepository("WSCallTrackingBundle:PhoneToUtmToUser")
            ->findOneBy(array("user"=>$this->getUser()->getID(),"id"=>$item_id));

        $PhoneToUtmToUser = new PhoneToUtmToUser();
        $PhoneToUtmToUser->setPhone($currentObj->getPhone());
        $PhoneToUtmToUser->setUtm($currentObj->getUtm());

        $form = $this->createFormBuilder($PhoneToUtmToUser)
            ->add('phone')
            ->add('utm')
            ->add('save', SubmitType::class, array('label' => 'Update'))
            ->getForm();

        $form->handleRequest($request);
        $data_arr = array(
            'form' => $form->createView(),
            'message'=>''
        );
        if ($form->isSubmitted() && $form->isValid()) {

            $PhoneToUtmToUser = $form->getData();
            $data_arr['message'] = 'Succesfully updated';
        }



        return $this->render('WSCallTrackingBundle:Personal:phonesEdit.html.twig',$data_arr);
    }

    /**
     * @Route("/tracklist/")
     */
    public function getTrackLIstAction() {
        $data_arr = [];
        $data_arr['track_list'] = $this->getDoctrine()
            ->getRepository("WSCallTrackingBundle:UserActivity")
            ->findByUser($this->getUser()->getID());
        return $this->render('WSCallTrackingBundle:Personal:tracklist.html.twig',$data_arr);
    }

    /**
     * @Route("/tracklist/detail/{user_activity_key}")
     */
    public function getTrackDetailAction($user_activity_key, Request $request) {
        $data_arr = [];
        $data_arr['track_detail'] = $this->getDoctrine()
            ->getRepository("WSCallTrackingBundle:UserActivityTrack")
            ->findBy(['userActivityKey'=>$user_activity_key],['createAt'=>'desc']);
        return $this->render('WSCallTrackingBundle:Personal:track_detail.html.twig',$data_arr);
    }

    /**
     * @Route("/get_phone/")
     */
    public function getPhoneList( Request $request ) {
        $data_arr = [];
        $json_decoded = json_decode($this->get('ws_api_phone_interface')->getNumberList());
        $data_arr['phonelist_obj'] = $json_decoded->info;

        return $this->render('WSCallTrackingBundle:Personal:get_phone.html.twig',$data_arr);
    }


    /**
     * @Route("/get_phone/get/{sip}")
     */
    public function getPhoneGet( Request $request ) {
        $data_arr = [];
        $json_decoded = json_decode($this->get('ws_api_phone_interface')->getNumberList());
        foreach ($json_decoded->info as $item){
            $sipArr[$item->sip] = $item->number;
        }
        /* echo "<pre>";
        print_r($json_decoded->info);
        echo "</pre>";*/
        if($sipArr[$request->get('sip')]) {
            $en_phones = new Phones();
            $en_phones->setPhoneNum($sipArr[$request->get('sip')]);

            $data_arr['error'] = 0;
            $data_arr['message'] = 'message 1';
        }else{
            $data_arr['error'] = 1;
            $data_arr['message'] = 'error message 1';
        }

        $response = new Response();
        $response->setContent(json_encode( $data_arr ));


        return $response;
    }
}