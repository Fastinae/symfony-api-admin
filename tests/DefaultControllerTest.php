<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testLoginPage()
    {
        // create Client
        $client = static::createClient();
        // Go to the 'URL `/login`
        $crawler = $client->request('GET', '/login');
        // Check that the server responds with an HTTP 200
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        // Check that the `Email` text is in the `body` tag
        $this->assertContains('Email', $crawler->filter('body')->text());
        // Check that the `Password` text is in the `body` tag
        $this->assertContains('Password', $crawler->filter('body')->text());
    }

}
