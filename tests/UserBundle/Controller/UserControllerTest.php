<?php

namespace UserBundle\Tests\Controller;

use Tests\UserBundle\Controller\Base\LoggedUserWebTestCase as Base;

class UserControllerTest extends Base
{
    /**
     * Test User Homepage
     */
    public function testHomePage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');

        $this->assertEquals(301, $client->getResponse()->getStatusCode());
    }
}
