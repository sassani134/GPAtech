<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserApiControllerTest extends WebTestCase
{
    public function testCreateUser()
    {
        $client = static::createClient();
        $client->request('POST', '/api/users', [], [], ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'nom' => 'Doe',
                'prenom' => 'John',
                'email' => 'john@example.com',
            ]));

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    public function testListUsers()
    {
        $client = static::createClient();
        $client->request('GET', '/api/users');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testReadUser()
    {
        // Assurez-vous qu'il y a un utilisateur avec id=1 dans votre base de données de test
        $client = static::createClient();
        $client->request('GET', '/api/users/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testUpdateUser()
    {
        // Idem, assurez-vous qu'il y a un utilisateur avec id=1
        $client = static::createClient();
        $client->request('PUT', '/api/users/1', [], [], ['CONTENT_TYPE' => 'application/json'],
            json_encode(['name' => 'Updated Name']));
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testDeleteUser()
    {
        // Idem, assurez-vous d'avoir un utilisateur à supprimer
        $client = static::createClient();
        $client->request('DELETE', '/api/users/1');
        $this->assertEquals(204, $client->getResponse()->getStatusCode());
    }
}
