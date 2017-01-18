<?php

namespace UserBundle\Tests\Controller;

use Tests\UserBundle\Controller\Base\LoggedUserWebTestCase as Base;

class UserControllerTest extends Base
{
    /**
     * Test if user can log as admin and access user path
     */
    public function testLoginUser(){
        $this->logInUser();

        $crawler = $this->client->request('GET', '/user/');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->request('GET', '/admin/');
        $this->assertEquals(403,  $this->client->getResponse()->getStatusCode());
    }

    /**
     * Test User Homepage
     */
    public function testHomePage()
    {
        $this->logInUser();

        $crawler = $this->client->request('GET', '/user/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
