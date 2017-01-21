<?php
/**
 * Created by PhpStorm.
 * User: jerem
 * Date: 21/01/2017
 * Time: 18:16
 */

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

/**
 * Class LoadUserData
 * @package UserBundle\DataFixtures\ORM
 */
class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        
        $userAdmin
            ->setUsername('admin')
            ->setEmail('admin@ixesn.fr')
            ->setPlainPassword('admin')
            ->setEnabled(1)
            ->setRoles(array('ROLE_ADMIN'))
        ;

        $manager->persist($userAdmin);

        $user = new User();

        $user
            ->setUsername('user')
            ->setEmail('user@ixesn.fr')
            ->setPlainPassword('user')
            ->setEnabled(1)
            ->setRoles(array('ROLE_USER'))
        ;

        $manager->persist($user);
        
        $manager->flush();
    }
}