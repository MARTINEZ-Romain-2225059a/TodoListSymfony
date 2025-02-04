<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TodoListController extends AbstractController
{
    #[Route('/todo', name: 'app_todo_list')]
    public function index(): Response
    {
        return $this->render('todo_list/index.html.twig', [
            'controller_name' => 'TodoListController',
        ]);
    }
}