<?php

namespace UserBundle\Tests\Controller;

use Tests\UserBundle\Controller\Base\LoggedUserWebTestCase as Base;

class AdminControllerTest extends Base
{
    /**
     * Test if user can log as admin and access admin path
     */
    public function testLoginAdmin(){
        $this->logInAdmin();

        $crawler = $this->client->request('GET', '/admin/');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertEquals(200,  $this->client->getResponse()->getStatusCode());
    }

    /**
     * Test User Homepage
     */
    public function testHomePage()
    {
        $this->logInAdmin();

        $crawler = $this->client->request('GET', '/admin/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }


}
