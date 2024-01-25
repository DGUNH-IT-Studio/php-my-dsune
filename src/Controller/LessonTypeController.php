<?php

namespace App\Controller;

use App\Entity\LessonType;
use App\Form\LessonTypeType;
use App\Repository\LessonTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesson/type')]
class LessonTypeController extends AbstractController
{
    #[Route('/', name: 'app_lesson_type_index', methods: ['GET'])]
    public function index(LessonTypeRepository $lessonTypeRepository): Response
    {
        return $this->render('lesson_type/index.html.twig', [
            'lesson_types' => $lessonTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lesson_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lessonType = new LessonType();
        $form = $this->createForm(LessonTypeType::class, $lessonType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lessonType);
            $entityManager->flush();

            return $this->redirectToRoute('app_lesson_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lesson_type/new.html.twig', [
            'lesson_type' => $lessonType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson_type_show', methods: ['GET'])]
    public function show(LessonType $lessonType): Response
    {
        return $this->render('lesson_type/show.html.twig', [
            'lesson_type' => $lessonType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lesson_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LessonType $lessonType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LessonTypeType::class, $lessonType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_lesson_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lesson_type/edit.html.twig', [
            'lesson_type' => $lessonType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson_type_delete', methods: ['POST'])]
    public function delete(Request $request, LessonType $lessonType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lessonType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lessonType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_lesson_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
