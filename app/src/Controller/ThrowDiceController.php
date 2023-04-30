<?php

namespace App\Controller;

use App\Form\ThrowDiceType;
use App\Entity\ThrowDiceHistory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\ThrowDiceHistoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;


class ThrowDiceController extends AbstractController
{
    /**
     * @Route("/throw/dice/{score}", name="app_throw_dice", defaults={"score": 1})
     */
    public function throwDice(
        Request $request,
        ValidatorInterface $validator,
        ThrowDiceHistoryRepository $throwDiceHistoryRepository,
        ManagerRegistry $doctrine,
        $score
      ): Response {

        if ($score > 6) {
            throw $this->createNotFoundException('Invalid score');
        }

        $entityManager = $doctrine->getManager();

        $form = $this->createForm(ThrowDiceType::class, null, [
            'default_score' => $score,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $playerRoll = $form->get('dice')->getData();
            $computerRoll = random_int(1, 6);

            $winner = '';
            if ($playerRoll > $computerRoll) {
              $winner = 'Player';
            } elseif ($playerRoll < $computerRoll) {
               $winner = 'Computer';
            } else {
                $winner = 'Draw';
            }

            $throwDiceHistory = new ThrowDiceHistory();
            $throwDiceHistory->setPlayerResult($playerRoll);
            $throwDiceHistory->setComputerResult($computerRoll);
            $throwDiceHistory->setWinner($winner);
            
            $errors = $validator->validate($throwDiceHistory);

            if (count($errors) > 0) {
                   $errorsString = (string) $errors;
                   return new Response($errorsString);
            }

            $entityManager->persist($throwDiceHistory);
            $entityManager->flush();

            return $this->redirectToRoute('app_history');
        }

        return $this->render('throw_dice/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/history", name="app_history")
     */
    public function throwDiceHistory(
        ThrowDiceHistoryRepository $throwDiceHistoryRepository
    ): Response {
        $history = $throwDiceHistoryRepository->findAll();
        
        if (!$history) {
            throw new ResourceNotFoundExceptionn('No history found');
        }

        return $this->render('throw_dice/history.html.twig', [
            'history' => $history,
        ]);
    }
}
