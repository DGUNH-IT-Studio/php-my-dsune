<?php

namespace App\Controller;

use App\Entity\Term;
use App\Form\TermType;
use App\Repository\TermRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/term')]
class TermController extends AbstractController
{
    #[Route('/', name: 'app_term_index', methods: ['GET'])]
    public function index(TermRepository $termRepository): Response
    {
        return $this->render('term/index.html.twig', [
            'terms' => $termRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_term_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $term = new Term();
        $form = $this->createForm(TermType::class, $term);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($term);
            $entityManager->flush();

            return $this->redirectToRoute('app_term_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('term/new.html.twig', [
            'term' => $term,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_term_show', methods: ['GET'])]
    public function show(Term $term): Response
    {
        return $this->render('term/show.html.twig', [
            'term' => $term,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_term_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Term $term, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TermType::class, $term);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_term_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('term/edit.html.twig', [
            'term' => $term,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_term_delete', methods: ['POST'])]
    public function delete(Request $request, Term $term, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$term->getId(), $request->request->get('_token'))) {
            $entityManager->remove($term);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_term_index', [], Response::HTTP_SEE_OTHER);
    }
}
