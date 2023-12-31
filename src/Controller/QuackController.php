<?php
namespace App\Controller;

use App\Entity\Comments;
use App\Entity\Quack;
use App\Form\CommentsType;
use App\Form\QuackType;
use App\Repository\QuackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/quack')]
class QuackController extends AbstractController
{


    #[Route('/', name: 'app_quack_index', methods: ['GET'])]
    public function index(QuackRepository $quackRepository): Response
    {
        return $this->render('quack/index.html.twig', [
            'quacks' => $quackRepository->findAll(),
        ]);
    }


    // create new quack
    #[Route('/new', name: 'app_quack_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $quack = new Quack();
        $quack->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(QuackType::class, $quack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($quack);
            $entityManager->flush();

            return $this->redirectToRoute('app_quack_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quack/new.html.twig', [
            'quack' => $quack,
            'form' => $form,
        ]);
    }


    #[Route('/comments', name: 'app_comment', methods: ['GET', 'POST'])]
    public function comments(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comments();
        $commentForm = $this->createForm(CommentsType::class, $comment);
        $commentForm->handleRequest($request);


        // traitement du formelaire

        if ($commentForm->isSubmitted() && $commentForm->isValid()){
            $comment->setCreateAt(new \DateTime());

            dd($comment);

        }



        return $this->render('comment/new.html.twig', [
            'commentForm' => $commentForm->createView()   // genere html de formulaire
        ]);
    }



    // show the quack
    #[Route('/{id}', name: 'app_quack_show', methods: ['GET'])]
    public function show(Quack $quack): Response
    {
        return $this->render('quack/show.html.twig', [
            'quack' => $quack,
            /*dd($quack),*/
        ]);
    }


    // edit the quack
    #[Route('/{id}/edit', name: 'app_quack_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Quack $quack, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuackType::class, $quack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_quack_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quack/edit.html.twig', [
            'quack' => $quack,
            'form' => $form,
        ]);
    }



    #[Route('/{id}', name: 'app_quack_delete', methods: ['POST'])]
    public function delete(Request $request, Quack $quack, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quack->getId(), $request->request->get('_token'))) {
            $entityManager->remove($quack);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_quack_index', [], Response::HTTP_SEE_OTHER);
    }
}
