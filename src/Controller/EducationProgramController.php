<?php

namespace App\Controller;

use App\Entity\EducationProgram;
use App\Form\EducationProgramType;
use App\Repository\EducationProgramRepository;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/education/program')]
class EducationProgramController extends AbstractController
{
//    #[Route('/list', name: 'app_education_program_index', methods: ['GET'])]
//    public function index(EducationProgramRepository $educationProgramRepository): Response
//    {
//        return $this->render('education_program/index.html.twig', [
//            'education_programs' => $educationProgramRepository->findAll(),
//        ]);
//    }

    #[Route('/list', name: 'app_education_program_list', methods: ['GET'], format: 'json')]
    public function list(EducationProgramRepository $educationProgramRepository): JsonResponse
    {
        return new JsonResponse($educationProgramRepository->list());
    }

    #[Route('/search', name: 'app_education_program_search', methods: ['GET'])]
    public function filter(
        EducationProgramRepository $educationProgramRepository,
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $educationLevelID,
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $educationFormID,
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $educationProfileID
    ): JsonResponse
    {
        return new JsonResponse($educationProgramRepository->search($educationLevelID, $educationFormID, $educationProfileID));
    }

    #[Route('/new', name: 'app_education_program_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $educationProgram = new EducationProgram();
        $form = $this->createForm(EducationProgramType::class, $educationProgram);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($educationProgram);
            $entityManager->flush();

            return $this->redirectToRoute('app_education_program_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('education_program/new.html.twig', [
            'education_program' => $educationProgram,
            'form' => $form,
        ]);
    }

    #[Route('/list/{id}', name: 'app_education_program_show', methods: ['GET'])]
    public function show(EducationProgram $educationProgram): Response
    {
        return $this->render('education_program/show.html.twig', [
            'education_program' => $educationProgram,
        ]);
    }

    #[Route('/list/{id}/edit', name: 'app_education_program_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EducationProgram $educationProgram, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EducationProgramType::class, $educationProgram);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_education_program_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('education_program/edit.html.twig', [
            'education_program' => $educationProgram,
            'form' => $form,
        ]);
    }

    #[Route('/list/{id}', name: 'app_education_program_delete', methods: ['POST'])]
    public function delete(Request $request, EducationProgram $educationProgram, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educationProgram->getId(), $request->request->get('_token'))) {
            $entityManager->remove($educationProgram);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_education_program_index', [], Response::HTTP_SEE_OTHER);
    }
}
