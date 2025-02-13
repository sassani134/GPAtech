<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/users', name: 'api_users_')]
class UserApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();
        $data = array_map(fn(Book $book) => [
            'id' => $users->getId(),
            'nom' => $users->getNom(),
            'prenom' => $users->getPrenom(),
            'email' => $users->getEmail(),
        ], $users);

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(Book $book): JsonResponse
    {
        return $this->json([
            'id' => $user->getId(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'created_at' => $user->getCreatedAt,
            'updated_at' => $user->getUpdatedAt,
        ]);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['titre'], $data['auteur'])) {
            return $this->json(['message' => 'Invalid data'], 400);
        }

        $user = new User();
        $user->setNom($data['nom']);
        $user->setPrenom($data['prenom']);
        $user->setEmail($data['email']);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTimeImmutable());

        $em->persist($user);
        $em->flush();

       
        return $this->json([
            'message' => 'User created!',
            'id' => $user->getId(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $user->getUpdatedAt()->format('Y-m-d H:i:s'),
        ], 201);
    } 

    

    #[Route('/{id}', methods: ['PUT', 'PATCH'])]
    public function update(Request $request, User $user, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['nom'])) {
            $user->setNom($data['nom']);
        }
        if (isset($data['prenom'])) {
            $user->setAuteur($data['prenom']);
        }
        if (isset($data['email'])) {
            $user->setNom($data['email']);
        }
        $user->setUpdatedAt(new \DateTimeImmutable());

        $em->flush();

        return $this->json([
            'message' => 'User updated!',
            'id' => $user->getId(),
            'updatedAt' => $user->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(User $user, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($book);
        $em->flush();

        return $this->json(['message' => 'User deleted!']);
    }
}