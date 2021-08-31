<?php
// tests/Controller/PostControllerTest.php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testPostSuccess()
    {
        $serverInformations = ['ACCEPT' => 'application/json', 'CONTENT-TYPE' => 'application/json'];
        $client = static::createClient();

        $client->request('POST', '/calculator/evaluate',[],[], $serverInformations,  '{"expression" : "99+1/100"}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(),);
    }

    public function testPostFailureInvalidExpression()
    {
        $serverInformations = ['ACCEPT' => 'application/json', 'CONTENT-TYPE' => 'application/json'];
        $client = static::createClient();

        $client->request('POST', '/calculator/evaluate',[],[], $serverInformations,  '{"expression" : "99++++1/100"}');
        echo $client->getResponse()->getStatusCode();
        $this->assertEquals(500, $client->getResponse()->getStatusCode(),);
    }

    public function testPostFailureDivisionByZero()
    {
        $serverInformations = ['ACCEPT' => 'application/json', 'CONTENT-TYPE' => 'application/json'];
        $client = static::createClient();

        $client->request('POST', '/calculator/evaluate',[],[], $serverInformations,  '{"expression" : "99+20-10*300/0"}');

        $this->assertEquals(500, $client->getResponse()->getStatusCode(),);
    }
}