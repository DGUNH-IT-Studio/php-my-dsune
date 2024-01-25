<?php

namespace App\Controller;

use App\Entity\EducationGroup;
use App\Form\EducationGroupType;
use App\Repository\EducationGroupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/education/group')]
class EducationGroupController extends AbstractController
{
    #[Route('/', name: 'app_education_group_index', methods: ['GET'])]
    public function index(EducationGroupRepository $educationGroupRepository): Response
    {
        return $this->render('education_group/index.html.twig', [
            'education_groups' => $educationGroupRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_education_group_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $educationGroup = new EducationGroup();
        $form = $this->createForm(EducationGroupType::class, $educationGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($educationGroup);
            $entityManager->flush();

            return $this->redirectToRoute('app_education_group_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('education_group/new.html.twig', [
            'education_group' => $educationGroup,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_group_show', methods: ['GET'])]
    public function show(EducationGroup $educationGroup): Response
    {
        return $this->render('education_group/show.html.twig', [
            'education_group' => $educationGroup,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_education_group_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EducationGroup $educationGroup, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EducationGroupType::class, $educationGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_education_group_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('education_group/edit.html.twig', [
            'education_group' => $educationGroup,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_group_delete', methods: ['POST'])]
    public function delete(Request $request, EducationGroup $educationGroup, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educationGroup->getId(), $request->request->get('_token'))) {
            $entityManager->remove($educationGroup);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_education_group_index', [], Response::HTTP_SEE_OTHER);
    }
}
