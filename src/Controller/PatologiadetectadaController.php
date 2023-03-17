<?php

namespace App\Controller;

use App\Entity\Patologiadetectada;
use App\Form\PatologiadetectadaType;
use App\Repository\PatologiadetectadaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/patologiadetectada')]
class PatologiadetectadaController extends AbstractController
{
    #[Route('/', name: 'app_patologiadetectada_index', methods: ['GET'])]
    public function index(PatologiadetectadaRepository $patologiadetectadaRepository): Response
    {
        return $this->render('patologiadetectada/index.html.twig', [
            'patologiadetectadas' => $patologiadetectadaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_patologiadetectada_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PatologiadetectadaRepository $patologiadetectadaRepository): Response
    {
        $patologiadetectada = new Patologiadetectada();
        $form = $this->createForm(PatologiadetectadaType::class, $patologiadetectada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $patologiadetectadaRepository->save($patologiadetectada, true);

            return $this->redirectToRoute('app_patologiadetectada_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('patologiadetectada/new.html.twig', [
            'patologiadetectada' => $patologiadetectada,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_patologiadetectada_show', methods: ['GET'])]
    public function show(Patologiadetectada $patologiadetectada): Response
    {
        return $this->render('patologiadetectada/show.html.twig', [
            'patologiadetectada' => $patologiadetectada,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_patologiadetectada_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Patologiadetectada $patologiadetectada, PatologiadetectadaRepository $patologiadetectadaRepository): Response
    {
        $form = $this->createForm(PatologiadetectadaType::class, $patologiadetectada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $patologiadetectadaRepository->save($patologiadetectada, true);

            return $this->redirectToRoute('app_patologiadetectada_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('patologiadetectada/edit.html.twig', [
            'patologiadetectada' => $patologiadetectada,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_patologiadetectada_delete', methods: ['POST'])]
    public function delete(Request $request, Patologiadetectada $patologiadetectada, PatologiadetectadaRepository $patologiadetectadaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$patologiadetectada->getId(), $request->request->get('_token'))) {
            $patologiadetectadaRepository->remove($patologiadetectada, true);
        }

        return $this->redirectToRoute('app_patologiadetectada_index', [], Response::HTTP_SEE_OTHER);
    }
}
