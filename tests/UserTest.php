<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserProperties(): void
    {
        $user = new User();
        $createdAt = new \DateTimeImmutable('-1 hour');
        $updatedAt = new \DateTimeImmutable();
        
        $user->setNom('Doe');
        $user->setPrenom('John');
        $user->setEmail('test@example.com');
        $user->setCreatedAt($createdAt);
        $user->setUpdatedAt($updatedAt);


        $this->assertSame('Doe', $user->getNom());
        $this->assertSame('John', $user->getPrenom());
        $this->assertSame('test@example.com', $user->getEmail());

        $this->assertInstanceOf(\DateTimeImmutable::class, $user->getCreatedAt());
        $this->assertEquals($createdAt, $user->getCreatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $user->getUpdatedAt());
        $this->assertEquals($updatedAt, $user->getUpdatedAt()); // Compare les valeurs


    }
}
