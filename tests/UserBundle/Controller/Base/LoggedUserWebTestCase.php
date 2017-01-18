<?php

namespace Tests\UserBundle\Controller\Base;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use Symfony\Bundle\FrameworkBundle\Client;
use UserBundle\Entity\User;

class LoggedUserWebTestCase extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client = null;

    /**
     * Set up client
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     * Test user and admin path
     */
    public function testSecuredAreas()
    {
        $crawler = $this->client->request('GET', '/user');
        $this->assertEquals(301, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->request('GET', '/admin');
        $this->assertEquals(301, $this->client->getResponse()->getStatusCode());
    }

    /**
     * LogIn as an user
     */
    public function logInUser(){
        $username = $this->client->getContainer()->getParameter('test_user');
        $password = $this->client->getContainer()->getParameter('test_pwd');

        $this->logIn($username, $password);
    }

    /**
     * LogIn as an admin
     */
    public function logInAdmin(){
        $username = $this->client->getContainer()->getParameter('test_admin_user');
        $password = $this->client->getContainer()->getParameter('test_admin_pwd');

        $this->logIn($username, $password);
    }

    /**
     * @param $username
     * @param $password
     */
    private function logIn($username, $password)
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form(array(
            '_username' => $username,
            '_password' => $password,
        ));

        $this->client->submit($form);
        $this->client->followRedirect();
    }
}