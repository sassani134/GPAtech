<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserApiController extends AbstractController
{
    #[Route('/user/api', name: 'app_user_api')]
    public function index(): Response
    {
        return $this->render('user_api/index.html.twig', [
            'controller_name' => 'UserApiController',
        ]);
    }
}
