<?php

namespace App\Controller;

use App\Entity\ScheduleRing;
use App\Form\ScheduleRingType;
use App\Repository\ScheduleRingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/schedule/ring')]
class ScheduleRingController extends AbstractController
{
    #[Route('/', name: 'app_schedule_ring_index', methods: ['GET'])]
    public function index(ScheduleRingRepository $scheduleRingRepository): Response
    {
        return $this->render('schedule_ring/index.html.twig', [
            'schedule_rings' => $scheduleRingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_schedule_ring_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scheduleRing = new ScheduleRing();
        $form = $this->createForm(ScheduleRingType::class, $scheduleRing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($scheduleRing);
            $entityManager->flush();

            return $this->redirectToRoute('app_schedule_ring_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('schedule_ring/new.html.twig', [
            'schedule_ring' => $scheduleRing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_schedule_ring_show', methods: ['GET'])]
    public function show(ScheduleRing $scheduleRing): Response
    {
        return $this->render('schedule_ring/show.html.twig', [
            'schedule_ring' => $scheduleRing,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_schedule_ring_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ScheduleRing $scheduleRing, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ScheduleRingType::class, $scheduleRing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_schedule_ring_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('schedule_ring/edit.html.twig', [
            'schedule_ring' => $scheduleRing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_schedule_ring_delete', methods: ['POST'])]
    public function delete(Request $request, ScheduleRing $scheduleRing, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scheduleRing->getId(), $request->request->get('_token'))) {
            $entityManager->remove($scheduleRing);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_schedule_ring_index', [], Response::HTTP_SEE_OTHER);
    }
}
