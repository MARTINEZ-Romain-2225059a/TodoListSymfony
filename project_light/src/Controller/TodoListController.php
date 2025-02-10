<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Form\TodoType;
use App\Repository\TodoRepository;
use App\Service\LanguageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class TodoListController extends AbstractController
{
    #[Route('/', name: 'app_todo', methods: ['GET'])]
    public function index(TodoRepository $todoRepository, LanguageService $languageService, Request $request, SessionInterface $session): Response
    {
        $languages = $languageService->getLanguages();

        $currentLanguage = $session->get('lang', 15); // ID 15 = Français par défaut

        if ($request->query->get('lang')) {
            $session->set('lang', $request->query->get('lang'));
            $currentLanguage = $request->query->get('lang');
        }

        return $this->render('todo_list/index.html.twig', [
            'todos' => $todoRepository->findAll(),
            'languages' => $languages,
            'currentLanguage' => $currentLanguage,
        ]);
    }


    #[Route('/new', name: 'app_todo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $todo = new Todo();
        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($todo);
            $em->flush();
            return $this->redirectToRoute('app_todo');
        }

        return $this->render('todo_list/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_todo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Todo $todo, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('app_todo');
        }

        return $this->render('todo_list/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_todo_delete', methods: ['POST'])]
    public function delete(Request $request, Todo $todo, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$todo->getId(), $request->request->get('_token'))) {
            $em->remove($todo);
            $em->flush();
        }

        return $this->redirectToRoute('app_todo');
    }
}
