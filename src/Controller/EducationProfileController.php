<?php

namespace App\Controller;

use App\Entity\EducationProfile;
use App\Form\EducationProfileType;
use App\Repository\EducationProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/education/profile')]
class EducationProfileController extends AbstractController
{
    #[Route('/', name: 'app_education_profile_index', methods: ['GET'])]
    public function index(EducationProfileRepository $educationProfileRepository): Response
    {
        return $this->render('education_profile/index.html.twig', [
            'education_profiles' => $educationProfileRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_education_profile_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $educationProfile = new EducationProfile();
        $form = $this->createForm(EducationProfileType::class, $educationProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($educationProfile);
            $entityManager->flush();

            return $this->redirectToRoute('app_education_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('education_profile/new.html.twig', [
            'education_profile' => $educationProfile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_profile_show', methods: ['GET'])]
    public function show(EducationProfile $educationProfile): Response
    {
        return $this->render('education_profile/show.html.twig', [
            'education_profile' => $educationProfile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_education_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EducationProfile $educationProfile, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EducationProfileType::class, $educationProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_education_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('education_profile/edit.html.twig', [
            'education_profile' => $educationProfile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_profile_delete', methods: ['POST'])]
    public function delete(Request $request, EducationProfile $educationProfile, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educationProfile->getId(), $request->request->get('_token'))) {
            $entityManager->remove($educationProfile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_education_profile_index', [], Response::HTTP_SEE_OTHER);
    }
}
