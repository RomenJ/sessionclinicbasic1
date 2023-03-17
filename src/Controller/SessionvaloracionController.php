<?php

namespace App\Controller;

use App\Entity\Sessionvaloracion;
use App\Form\SessionvaloracionType;
use App\Repository\SessionvaloracionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sessionvaloracion')]
class SessionvaloracionController extends AbstractController
{
    #[Route('/', name: 'app_sessionvaloracion_index', methods: ['GET'])]
    public function index(SessionvaloracionRepository $sessionvaloracionRepository): Response
    {
        return $this->render('sessionvaloracion/index.html.twig', [
            'sessionvaloracions' => $sessionvaloracionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sessionvaloracion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SessionvaloracionRepository $sessionvaloracionRepository): Response
    {
        $sessionvaloracion = new Sessionvaloracion();
        $form = $this->createForm(SessionvaloracionType::class, $sessionvaloracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sessionvaloracionRepository->save($sessionvaloracion, true);

            return $this->redirectToRoute('app_sessionvaloracion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sessionvaloracion/new.html.twig', [
            'sessionvaloracion' => $sessionvaloracion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sessionvaloracion_show', methods: ['GET'])]
    public function show(Sessionvaloracion $sessionvaloracion): Response
    {
        return $this->render('sessionvaloracion/show.html.twig', [
            'sessionvaloracion' => $sessionvaloracion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sessionvaloracion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sessionvaloracion $sessionvaloracion, SessionvaloracionRepository $sessionvaloracionRepository): Response
    {
        $form = $this->createForm(SessionvaloracionType::class, $sessionvaloracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sessionvaloracionRepository->save($sessionvaloracion, true);

            return $this->redirectToRoute('app_sessionvaloracion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sessionvaloracion/edit.html.twig', [
            'sessionvaloracion' => $sessionvaloracion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sessionvaloracion_delete', methods: ['POST'])]
    public function delete(Request $request, Sessionvaloracion $sessionvaloracion, SessionvaloracionRepository $sessionvaloracionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sessionvaloracion->getId(), $request->request->get('_token'))) {
            $sessionvaloracionRepository->remove($sessionvaloracion, true);
        }

        return $this->redirectToRoute('app_sessionvaloracion_index', [], Response::HTTP_SEE_OTHER);
    }
}
