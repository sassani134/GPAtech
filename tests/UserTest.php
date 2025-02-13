<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserProperties(): void
    {
        $user = new User();
        
        $user->setNom('Doe');
        $user->setPrenom('John');
        $user->setEmail('test@example.com');
        $user->setCreatedAt('');
        $user->setUpdatedAt('');

        $this->assertSame('Doe', $user->getNom());
        $this->assertSame('John', $user->getPrenom());
        $this->assertSame('test@example.com', $user->getEmail());
    }
}
