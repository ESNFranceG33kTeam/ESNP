<?php

namespace Tests\UserBundle\Controller\Base;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use Symfony\Bundle\FrameworkBundle\Client;

class LoggedUserWebTestCase extends WebTestCase
{
    /**
     * @var Client
     */
    private $client = null;

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

    public function testLogin(){
        $this->logIn();

        $crawler = $this->client->request('GET', '/user');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewall = 'main';

        $token = new UsernamePasswordToken('admin', null, $firewall, array('ROLE_USER'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}