<?php

namespace App\Controller;

use App\Entity\Date;
use App\Form\DateFormType;
use App\Repository\DateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DateController extends AbstractController
{
    #[Route('/date', name: 'app_date')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Date::class);
        $dates = $repository->findBy(array(), array('name' => 'ASC'));

        return $this->render('date/index.html.twig', [
            'dates' => $dates,
        ]);
    }

    #[Route('/date/edit/{id}', name: 'app_date_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, int $id): Response
    {
        $repository = $entityManager->getRepository(Date::class);
        $date = $repository->find($id);

        $form = $this->createForm(DateFormType::class, $date);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($date);
            $entityManager->flush();

            return $this->redirectToRoute('app_date');
        }
        return $this->render('date/edit.html.twig', [
            'form' => $form,
            'date' => $date
        ]);
    }
}
