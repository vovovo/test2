<?php
namespace WS\CallTrackingBundle\Service;
use WS\CallTrackingBundle\Service\ZadarmaClient;
use WS\CallTrackingBundle\Entity as WSENTITY;
use Doctrine_core;
use Exception;
class ApiPhoneInterface extends ZadarmaClient
{
    private $client;

    public function __construct($k, $s, $b){
        $this->client =  new parent($k, $s, $b);
    }

    public function getSipList(){
        return $this->client->call("/v1/sip/");
    }

    public function getNumberList(){
        return $this->client->call("/v1/direct_numbers/");
    }

    public function getTarifInfo(){
        $this->client->call("/v1/tariff/");
    }

    public function getInternalNumbers(){
        $this->client->call("/v1/pbx/internal/");
    }

    public function parsePhones(){
        $enPhones = new WSENTITY\Phones();
        $dn_object = self::getNumberList();
        foreach($dn_object->info as $item){
            $phonesArr[$item->sip] = $item->number;
        }
        $em = $this->getDoctrine()->getManager();
        foreach($phonesArr as $key=>$item) {

            /*$em->persist($enPhones);
            $em->flush();*/
        }
    }



}