<?php

    namespace WS\CallTrackingBundle\Menu;
    use Knp\Menu\FactoryInterface;
    use Symfony\Component\DependencyInjection\ContainerAwareInterface;
    use Symfony\Component\DependencyInjection\ContainerAwareTrait;

    class Builder implements ContainerAwareInterface
    {
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
    $menu = $factory->createItem('root');

    // $menu->addChild('Profile', array('route' => '/profile'));

    // access services from the container!
    $em = $this->container->get('doctrine')->getManager();

    // create another menu item
  //  $menu->addChild('About Me', array('route' => 'about'));
    // you can also add sub level's to your menu's as follows
    //$menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

    // ... add more children

    return $menu;
      }
    }


?>